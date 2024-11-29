<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageController extends Controller
{
    /**
     * Ready the permissions.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:package-list|package-create|package-edit|package-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:package-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:package-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:package-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $packages = Package::with('customer')->orderBy('tracking_number')->paginate(5);

        return view('packages.index', compact('packages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $packageLatest = Package::select('tracking_number')->orderBy('id', 'desc')->first();
        $packageNumber = substr($packageLatest->tracking_number, 2);
        $newTrackingNumber = ++$packageNumber;
        $customers = Customer::orderBy('name')->orderBy('surname')->get();
        return view('packages.create')->with('customers', $customers)->with('newTrackingNumber', 'PM' . $newTrackingNumber);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'customer_id' => 'required',
            'tracking_number' => 'required|max:12|unique:packages,tracking_number',
            'weight' => 'required',
            'dimension_x' => 'required',
            'dimension_y' => 'required',
            'dimension_z' => 'required',
            'status' => 'required|max:18'
        ]);

        $formData = $request->all();
        if ($formData['status'] === 'collected') {
            $formData['collected_at'] = date('Y-m-d H:i:s');
        }
        Package::create($formData);

        return redirect()->route('packages.index')
            ->with('success', 'Package created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Package $package
     * @return View
     */
    public function show(Package $package): View
    {
        return view('packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Package $package
     * @return View
     */
    public function edit(Package $package): View
    {
        $customers = Customer::orderBy('name')->orderBy('surname')->get();
        return view('packages.edit', compact('package'))->with('customers', $customers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Package $package
     * @return RedirectResponse
     */
    public function update(Request $request, Package $package): RedirectResponse
    {
        request()->validate([
            'customer_id' => 'required',
            'tracking_number' => 'required|max:12',
            'weight' => 'required',
            'dimension_x' => 'required',
            'dimension_y' => 'required',
            'dimension_z' => 'required',
            'status' => 'required|max:18'
        ]);

        $package->update($request->all());

        return redirect()->route('packages.index')
            ->with('success', 'Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Package $package
     * @return RedirectResponse
     */
    public function destroy(Package $package): RedirectResponse
    {
        $package->delete();

        return redirect()->route('packages.index')
            ->with('success', 'Package deleted successfully.');
    }
}
