@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('users.index') }}" role="button" data-mdb-ripple-init title="Back to Users">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <h2>Show User</h2>
            <hr class="hr hr-blurry" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Name:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            {{ $user->name }}
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
            {{ $user->surname }}
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
            {{ $user->email }}
        </div>
    </div>

    <div class="row">
        <hr class="hr hr-blurry"/>
    </div>

    <div class="row mb-3">
        <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-nowrap">
            <strong>Roles:</strong>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-lg-11 ps-3 ps-md-3 ps-lg-5 ps-xl-5">
            @php
                $userBadgeColor = [];
                $badgeColors = [
                    'admin' => 'role-admin',
                    'manager' => 'role-manager',
                    'scheduling' => 'role-scheduling',
                    'user' => 'role-user',
                    'customer' => 'role-customer'
                ];
                if (!empty($user->getRoleNames())) {
                    foreach ($user->getRoleNames() as $v) {
                        $userBadgeColor[strtolower($v)] = $badgeColors[strtolower($v)];
                    }
                }
            @endphp
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <div class="badge {{$userBadgeColor[strtolower($v)]}}">{{ $v }}</div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
