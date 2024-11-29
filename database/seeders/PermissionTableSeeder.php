<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'customer-create',
            'customer-delete',
            'customer-edit',
            'customer-list',
            'delivery-schedule-create',
            'delivery-schedule-delete',
            'delivery-schedule-edit',
            'delivery-schedule-list',
            'driver-assignments-create',
            'driver-assignments-delete',
            'driver-assignments-edit',
            'driver-assignments-list',
            'driver-create',
            'driver-delete',
            'driver-edit',
            'driver-list',
            'package-create',
            'package-delete',
            'package-edit',
            'package-list',
            'permission-create',
            'permission-delete',
            'permission-edit',
            'permission-list',
            'report-create',
            'report-delete',
            'report-edit',
            'report-list',
            'role-create',
            'role-delete',
            'role-edit',
            'role-list',
            'user-create',
            'user-delete',
            'user-edit',
            'user-list',
            'vehicle-assignments-create',
            'vehicle-assignments-delete',
            'vehicle-assignments-edit',
            'vehicle-assignments-list',
            'vehicle-create',
            'vehicle-delete',
            'vehicle-edit',
            'vehicle-list',
            'warehouse-create',
            'warehouse-delete',
            'warehouse-edit',
            'warehouse-list'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
