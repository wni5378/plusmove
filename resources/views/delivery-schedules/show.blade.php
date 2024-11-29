@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('delivery-schedules.index') }}" role="button"
                   data-mdb-ripple-init title="Back to Delivery Schedules">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <h2>Show Delivery Schedule</h2>
            <hr class="hr hr-blurry" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Package:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $delivery->package->tracking_number }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Customer:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $delivery->customer->name }} {{ $delivery->customer->surname }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Address:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $delivery->customer->address_line_1 }}
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">&nbsp;</div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $delivery->customer->address_line_2 }}
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">&nbsp;</div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $delivery->customer->region }}
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">&nbsp;</div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $delivery->customer->country }}
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">&nbsp;</div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $delivery->customer->postal_code }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Status:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ ucwords(str_replace('-', ' ', $delivery->package->status)) }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Driver:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $driverAssignment->driver->name }} {{ $driverAssignment->driver->surname }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Vehicle:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $driverAssignment->vehicle->make }} {{ $driverAssignment->vehicle->model }} ({{ $driverAssignment->vehicle->registration_number }})
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Assigned By:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $driverAssignment->user->name }} {{ $driverAssignment->user->surname }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Date Assigned:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $driverAssignment->assigned_at }}
        </div>
    </div>

@endsection
