@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('packages.index') }}" role="button" data-mdb-ripple-init title="Back to Packages">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <h2>Create New Package</h2>
            <hr class="hr hr-blurry" />
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('packages.store') }}">
        @csrf
        <!-- Tracking Number and Weight -->
        <div class="row g-4">
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="tracking_number" id="tracking_number" class="form-control" required readonly
                           autocomplete="tracking_number" value="{{ $newTrackingNumber }}">
                    <label class="form-label" for="tracking_number">Tracking Number:</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="number" name="weight" id="weight" class="form-control" required autocomplete="weight">
                    <label class="form-label" for="weight">Weight:</label>
                </div>
            </div>
        </div>

        <!-- Dimension X and Dimension Y -->
        <div class="row g-4">
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="number" name="dimension_x" id="dimension_x" class="form-control" required
                           autocomplete="dimension_x">
                    <label class="form-label" for="dimension_x">Dimension X:</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="number" name="dimension_y" id="dimension_y" class="form-control" required
                           autocomplete="dimension_y">
                    <label class="form-label" for="dimension_y">Dimension Y:</label>
                </div>
            </div>
        </div>

        <!-- Dimension Z -->
        <div class="row g-4">
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="number" name="dimension_z" id="dimension_z" class="form-control" required
                           autocomplete="dimension_z">
                    <label class="form-label" for="dimension_z">Dimension Z:</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-2 mb-md-4"></div>
        </div>

        <!-- Customer and Status -->
        <div class="row g-4">
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <label class="form-label" for="roles">Customer:</label>
                <select name="customer_id" id="customer_id" class="form-select" required autocomplete="customer_id">
                    <option value="" selected>Select Customer</option>
                    @foreach ($customers as $key => $value)
                        <option value="{{ $value->id }}">
                            {{ $value->name }} {{ $value->surname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <label class="form-label" for="status">Status:</label>
                <select name="status" id="status" class="form-select" required autocomplete="status">
                    <option value="" selected>Select Status</option>
                    <option value="collected">Collected</option>
                    <option value="at-warehouse">At Warehouse</option>
                    <option value="onboard-vehicle">Onboard Vehicle</option>
                    <option value="returned-warehouse">Returned Warehouse</option>
                    <option value="delivered">Delivered</option>
                </select>
            </div>
            <div class="col-12 col-md-6 mb-2 mb-md-4"></div>
        </div>

        <!-- Submit -->
        <div class="row g-1">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3">
                    <i class="fa-solid fa-floppy-disk"></i> Submit
                </button>
            </div>
        </div>
    </form>

@endsection
