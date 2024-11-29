@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('permissions.index') }}" role="button" data-mdb-ripple-init title="Back to Permissions">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <h2>Show Permission</h2>
            <hr class="hr hr-blurry" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Name:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $permission->name }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Guard Name:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $permission->guard_name }}
        </div>
    </div>

@endsection
