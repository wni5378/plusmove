<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DeliverySchedule;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeliveryScheduleController extends Controller
{
    /**
     * Ready the permissions.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:delivery-schedule-list|delivery-schedule-create|delivery-schedule-edit|delivery-schedule-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:delivery-schedule-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:delivery-schedule-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delivery-schedule-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $currentUser = auth()->user();
        $currentUserRoles = $currentUser->getRoleNames()->toArray();
        $deliverySchedules = DeliverySchedule::with('package')->with('user')->with('customer')
            ->latest()->paginate(5);
        if (in_array('User', $currentUserRoles)) {
            $deliverySchedules = DeliverySchedule::with('package')
                ->latest()->paginate(5);
        }
        return view('delivery-schedules.index', compact('deliverySchedules'))->with('package')
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $packages = Package::whereNull('delivery_schedule_id')->get();
        $customers = Customer::get();
        return view('delivery-schedules.create', compact('packages', 'customers'));
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
            'driver_assignment_id' => 'required',
            'vehicle_assignment_id' => 'required|max:4',
            'delivery_type' => 'required',
            'delivery_notes' => 'max:255'
        ]);

        $deliverySchedule = DeliverySchedule::create($request->all());

        return redirect()->route('delivery-schedules.index')
            ->with('success', 'Delivery Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param DeliverySchedule $deliverySchedule
     * @return View
     */
    public function show(DeliverySchedule $deliverySchedule): View
    {
        $delivery = $deliverySchedule::with('package')->with('customer')->with('user')
            ->with('driverAssignment')->first();
        $driverAssignment = $deliverySchedule->driverAssignment()->with('driver')
            ->with('vehicle')->first();
        return view('delivery-schedules.show')->with('delivery', $delivery)
            ->with('driverAssignment', $driverAssignment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DeliverySchedule $deliverySchedule
     * @return View
     */
    public function edit(DeliverySchedule $deliverySchedule): View
    {
        return view('delivery-schedules.edit', compact('deliverySchedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param DeliverySchedule $deliverySchedule
     * @return RedirectResponse
     */
    public function update(Request $request, DeliverySchedule $deliverySchedule): RedirectResponse
    {
        request()->validate([
            'package_id' => 'required',
            'driver_assignment_id' => 'required',
            'vehicle_assignment_id' => 'required|max:4',
            'delivery_type' => 'required',
            'delivery_notes' => 'max:255'
        ]);

        $deliverySchedule->update($request->all());

        return redirect()->route('delivery-schedules.index')
            ->with('success', 'Delivery Schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeliverySchedule $deliverySchedule
     * @return RedirectResponse
     */
    public function destroy(DeliverySchedule $deliverySchedule): RedirectResponse
    {
        $deliverySchedule->delete();

        return redirect()->route('delivery-schedules.index')
            ->with('success', 'Delivery Schedule deleted successfully.');
    }
}
