<?php

namespace App\Http\Controllers;

use App\Models\DriverAssignment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DriverAssignmentController extends Controller
{
    /**
     * Ready the permissions.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:driver-assignments-list|driver-assignments-create|driver-assignments-edit|driver-assignments-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:driver-assignments-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:driver-assignments-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:driver-assignments-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $driverAssignments = DriverAssignment::latest()->paginate(5);

        return view('driver-assignments.index', compact('driverAssignments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('driver-assignments.create');
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
            'package_id' => 'required',
            'driver_id' => 'required',
            'user_id' => 'required',
            'assigned_at' => 'required',
            'delivered_at' => 'max:255'
        ]);

        DriverAssignment::create($request->all());

        return redirect()->route('driver-assignments.index')
            ->with('success', 'Driver Assignment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param DriverAssignment $driverAssignment
     * @return View
     */
    public function show(DriverAssignment $driverAssignment): View
    {
        return view('driver-assignments.show', compact('driverAssignment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DriverAssignment $driverAssignment
     * @return View
     */
    public function edit(DriverAssignment $driverAssignment): View
    {
        return view('driver-assignments.edit', compact('driverAssignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param DriverAssignment $driverAssignment
     * @return RedirectResponse
     */
    public function update(Request $request, DriverAssignment $driverAssignment): RedirectResponse
    {
        request()->validate([
            'package_id' => 'required',
            'driver_id' => 'required',
            'user_id' => 'required',
            'assigned_at' => 'required',
            'delivered_at' => 'max:255'
        ]);

        $driverAssignment->update($request->all());

        return redirect()->route('driver-assignments.index')
            ->with('success', 'Driver Assignment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DriverAssignment $driverAssignment
     * @return RedirectResponse
     */
    public function destroy(DriverAssignment $driverAssignment): RedirectResponse
    {
        $driverAssignment->delete();

        return redirect()->route('driver-assignments.index')
            ->with('success', 'Driver Assignment deleted successfully.');
    }
}
