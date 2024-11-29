@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('customers.index') }}" role="button"
                   data-mdb-ripple-init title="Back to Customers">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <h2>Show Customer</h2>
            <hr class="hr hr-blurry" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Name:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $customer->name }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Surname:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $customer->surname }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Email:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $customer->email }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Phone:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $customer->phone }}
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
            {{ $customer->address_line_1 }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Suburb:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $customer->address_line_2 }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Province:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $customer->region }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Country:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $customer->country }}
        </div>
    </div>

@endsection
