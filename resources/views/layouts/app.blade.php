<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-mdb-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#responsive_nav_content" aria-controls="responsive_nav_content"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="responsive_nav_content">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="{{ url('/') }}">
                    <img src="{{ url('img/plusmove-logo.png') }}" class="logo rounded"
                         alt="PlusMove" loading="lazy"/>
                </a>
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto"></ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link{{ str_contains(url()->full(), 'login') ? ' active nav-active-border-bottom' : ' nav-inactive-border-bottom' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link{{ str_contains(url()->full(), 'register') ? ' active nav-active-border-bottom' : ' nav-inactive-border-bottom' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <!-- Admin -->
                        @can('user-list')
                            <li class="nav-item dropdown{{ (str_contains(url()->full(), 'users') || str_contains(url()->full(), 'roles') || str_contains(url()->full(), 'permissions')) ? ' active nav-active-border-bottom' : '' }} me-2">
                                <a id="admin_dropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('Admin') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="admin_dropdown">
                                    <!-- Users -->
                                    <a class="dropdown-item{{ str_contains(url()->full(), 'users') ? ' active nav-active-border-bottom' : '' }}" href="{{ route('users.index') }}">
                                        {{ __('Users') }}
                                    </a>
                                    <!-- Roles -->
                                    @can('role-list')
                                        <a class="dropdown-item{{ str_contains(url()->full(), 'roles') ? ' active nav-active-border-bottom' : '' }}" href="{{ route('roles.index') }}">
                                            {{ __('Roles') }}
                                        </a>
                                    @endcan
                                    <!-- Permissions -->
                                    @can('permission-list')
                                        <a class="dropdown-item{{ str_contains(url()->full(), 'permissions') ? ' active nav-active-border-bottom' : '' }}" href="{{ route('permissions.index') }}">
                                            {{ __('Permissions') }}
                                        </a>
                                    @endcan
                                </div>
                            </li>
                        @endcan
                        <!-- Customers -->
                        @can('customer-list')
                            <li><a class="nav-link{{ str_contains(url()->full(), 'customers') ? ' active nav-active-border-bottom' : '' }} me-2" href="{{ route('customers.index') }}">Customers</a></li>
                        @endcan
                        <!-- Packages -->
                        @can('package-list')
                        <li><a class="nav-link{{ str_contains(url()->full(), 'packages') ? ' active nav-active-border-bottom' : '' }} me-2" href="{{ route('packages.index') }}">Packages</a></li>
                        @endcan
                        <!-- Delivery Schedules -->
                        @can('delivery-schedule-list')
                        <li><a class="nav-link{{ str_contains(url()->full(), 'delivery-schedules') ? ' active nav-active-border-bottom' : '' }} me-2" href="{{ route('delivery-schedules.index') }}">Delivery Schedules</a></li>
                        @endcan
                        <!-- Reports -->
                        @can('report-list')
                        <li><a class="nav-link{{ str_contains(url()->full(), 'reports') ? ' active nav-active-border-bottom' : '' }} me-2" href="{{ route('reports.index') }}">Reports</a></li>
                        @endcan
                        <!-- Warehouses -->
                        @can('warehouse-list')
                        <li><a class="nav-link{{ str_contains(url()->full(), 'warehouses') ? ' active nav-active-border-bottom' : '' }} me-2" href="{{ route('warehouses.index') }}">Warehouses</a></li>
                        @endcan
                        <!-- Drivers -->
                        @can('driver-list')
                            <li class="nav-item dropdown{{ str_contains(url()->full(), 'driver') ? ' active nav-active-border-bottom' : '' }} me-2">
                                <a id="driver_dropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('Drivers') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="driver_dropdown">
                                    <!-- Drivers -->
                                    <a class="dropdown-item{{ str_contains(url()->full(), 'drivers') ? ' active nav-active-border-bottom' : '' }}" href="{{ route('drivers.index') }}">
                                        {{ __('Drivers') }}
                                    </a>
                                    <!-- Drivers Assignments -->
                                    @can('driver-assignments-list')
                                        <a class="dropdown-item{{ str_contains(url()->full(), 'driver-assignments') ? ' active nav-active-border-bottom' : '' }}" href="{{ route('driver-assignments.index') }}">
                                            {{ __('Driver Assignments') }}
                                        </a>
                                    @endcan
                                </div>
                            </li>
                        @endcan
                        <!-- Vehicles -->
                        @can('vehicle-list')
                            <li class="nav-item dropdown{{ str_contains(url()->full(), 'vehicle') ? ' active nav-active-border-bottom' : '' }} me-2">
                                <a id="vehicle_dropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('Vehicles') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="vehicle_dropdown">
                                    <!-- Vehicles -->
                                    <a class="dropdown-item{{ str_contains(url()->full(), 'vehicles') ? ' active nav-active-border-bottom' : '' }}" href="{{ route('vehicles.index') }}">
                                        {{ __('Vehicles') }}
                                    </a>
                                    <!-- Vehicle Assignments -->
                                    @can('vehicle-assignments-list')
                                        <a class="dropdown-item{{ str_contains(url()->full(), 'vehicle-assignments') ? ' active nav-active-border-bottom' : '' }}" href="{{ route('vehicle-assignments.index') }}">
                                            {{ __('Vehicle Assignments') }}
                                        </a>
                                    @endcan
                                </div>
                            </li>
                        @endcan
                        @php
                            $roleBackgroundColor = '';
                            $roleColors = [
                                'admin' => 'role-admin-border-bottom',
                                'manager' => 'role-manager-border-bottom',
                                'scheduling' => 'role-scheduling-border-bottom',
                                'user' => 'role-user-border-bottom',
                                'customer' => 'role-user-border-bottom',
                            ];
                            if (!empty(auth()->user()->getRoleNames())) {
                                foreach (auth()->user()->getRoleNames() as $v) {
                                    $roleBackgroundColor = $roleColors[strtolower($v)];
                                }
                            }
                        @endphp
                        <!-- Logout -->
                        <!-- Navbar dropdown -->
                        <li class="nav-item dropdown {{ $roleBackgroundColor }}">
                            <a data-mdb-dropdown-init class="nav-link dropdown-toggle" href="#" id="user_dropdown"
                               role="button" aria-expanded="false">
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            </a>
                            <!-- Dropdown menu -->
                            <ul class="dropdown-menu" aria-labelledby="user_dropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!-- Navbar dropdown -->
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                @if (str_contains(url()->full(), 'login') || str_contains(url()->full(), 'register') || str_contains(url()->full(), 'reset'))
                <div class="col-md-12">
                    @yield('content')
                </div>
                @else
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>
</div>
</body>
</html>
