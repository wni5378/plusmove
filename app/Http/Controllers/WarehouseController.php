<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WarehouseController extends Controller
{
    /**
     * Ready the permissions.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:warehouse-list|warehouse-create|warehouse-edit|warehouse-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:warehouse-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:warehouse-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:warehouse-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $warehouses = Warehouse::latest()->paginate(5);

        return view('warehouses.index', compact('warehouses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('warehouses.create');
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
            'name' => 'required',
            'region' => 'required',
            'address' => 'required'
        ]);

        Warehouse::create($request->all());

        return redirect()->route('warehouses.index')
            ->with('success', 'Warehouse created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Warehouse $warehouse
     * @return View
     */
    public function show(Warehouse $warehouse): View
    {
        return view('warehouses.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Warehouse $warehouse
     * @return View
     */
    public function edit(Warehouse $warehouse): View
    {
        return view('warehouses.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Warehouse $warehouse
     * @return RedirectResponse
     */
    public function update(Request $request, Warehouse $warehouse): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'region' => 'required',
            'address' => 'required'
        ]);

        $warehouse->update($request->all());

        return redirect()->route('warehouses.index')
            ->with('success', 'Warehouse updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Warehouse $warehouse
     * @return RedirectResponse
     */
    public function destroy(Warehouse $warehouse): RedirectResponse
    {
        $warehouse->delete();

        return redirect()->route('warehouses.index')
            ->with('success', 'Warehouse deleted successfully.');
    }
}
