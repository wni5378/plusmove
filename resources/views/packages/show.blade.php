@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('packages.index') }}" role="button"
                   data-mdb-ripple-init title="Back to Packages">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <h2>Show Package</h2>
            <hr class="hr hr-blurry" />
        </div>
    </div>

    <!-- Tracking Number -->
    <div class="row mb-3">
        <div class="col-5 col-sm-5 col-md-5 col-lg-2 text-nowrap">
            <strong>Tracking Number:</strong>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-10 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $package->tracking_number }}
        </div>
    </div>

    <!-- Divider -->
    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <!-- Customer -->
    <div class="row mb-3">
        <div class="col-5 col-sm-5 col-md-5 col-lg-2 text-nowrap">
            <strong>Customer:</strong>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-10 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $package->customer->name }} {{ $package->customer->surname }}
        </div>
    </div>

    <!-- Divider -->
    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <!-- Weight -->
    <div class="row mb-3">
        <div class="col-5 col-sm-5 col-md-5 col-lg-2 text-nowrap">
            <strong>Weight:</strong>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-10 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ number_format($package->weight) }}
        </div>
    </div>

    <!-- Divider -->
    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <!-- Dimension X -->
    <div class="row mb-3">
        <div class="col-5 col-sm-5 col-md-5 col-lg-2 text-nowrap">
            <strong>Dimension X:</strong>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-10 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ number_format($package->dimension_x) }}
        </div>
    </div>

    <!-- Divider -->
    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <!-- Dimension Y -->
    <div class="row mb-3">
        <div class="col-5 col-sm-5 col-md-5 col-lg-2 text-nowrap">
            <strong>Dimension Y:</strong>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-10 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ number_format($package->dimension_y) }}
        </div>
    </div>

    <!-- Divider -->
    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <!-- Dimension Z -->
    <div class="row mb-3">
        <div class="col-5 col-sm-5 col-md-5 col-lg-2 text-nowrap">
            <strong>Dimension Z:</strong>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-10 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ number_format($package->dimension_z) }}
        </div>
    </div>

    <!-- Divider -->
    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <!-- Status -->
    <div class="row mb-3">
        <div class="col-5 col-sm-5 col-md-5 col-lg-2 text-nowrap">
            <strong>Status:</strong>
        </div>
        <div class="col-7 col-sm-7 col-md-7 col-lg-10 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ ucwords(str_replace('-', ' ', $package->status)) }}
        </div>
    </div>

@endsection
