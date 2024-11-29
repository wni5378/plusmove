<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryScheduleController;
use App\Http\Controllers\DriverAssignmentController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleAssignmentController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('customers', CustomerController::class);
    Route::resource('delivery-schedules', DeliveryScheduleController::class);
    Route::resource('driver-assignments', DriverAssignmentController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('vehicle-assignments', VehicleAssignmentController::class);
    Route::resource('warehouses', WarehouseController::class);
});
