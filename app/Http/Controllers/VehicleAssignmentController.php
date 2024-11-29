<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\VehicleAssignment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehicleAssignmentController extends Controller
{
    /**
     * Ready the permissions.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:vehicle-assignments-list|vehicle-assignments-create|vehicle-assignments-edit|vehicle-assignments-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:vehicle-assignments-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:vehicle-assignments-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:vehicle-assignments-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $vehicleAssignments = VehicleAssignment::latest()->paginate(5);

        return view('vehicle-assignments.index', compact('vehicleAssignments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('vehicle-assignments.create');
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
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'user_id' => 'required',
            'assigned_at' => 'required'
        ]);

        VehicleAssignment::create($request->all());

        return redirect()->route('vehicle-assignments.index')
            ->with('success', 'Vehicle Assignment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param VehicleAssignment $vehicleAssigment
     * @return View
     */
    public function show(VehicleAssignment $vehicleAssigment): View
    {
        return view('vehicle-assignments.show', compact('vehicleAssigment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param VehicleAssignment $vehicleAssigment
     * @return View
     */
    public function edit(VehicleAssignment $vehicleAssigment): View
    {
        return view('vehicle-assignments.edit', compact('vehicleAssigment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param VehicleAssignment $vehicleAssigment
     * @return RedirectResponse
     */
    public function update(Request $request, VehicleAssignment $vehicleAssigment): RedirectResponse
    {
        request()->validate([
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'user_id' => 'required',
            'assigned_at' => 'required'
        ]);

        $vehicleAssigment->update($request->all());

        return redirect()->route('vehicle-assignments.index')
            ->with('success', 'Vehicle Assignment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param VehicleAssignment $vehicleAssigment
     * @return RedirectResponse
     */
    public function destroy(VehicleAssignment $vehicleAssigment): RedirectResponse
    {
        $vehicleAssigment->delete();

        return redirect()->route('vehicle-assignments.index')
            ->with('success', 'Vehicle Assignment deleted successfully.');
    }
}
