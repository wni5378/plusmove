<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Stoney',
            'surname' => 'Tark',
            'email' => 'manager@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => bcrypt('12345678')
        ]);

        $role = Role::create(['name' => 'Manager']);

        $role->syncPermissions([
            'customer-create',
            'customer-edit',
            'customer-list',
            'delivery-schedule-create',
            'delivery-schedule-edit',
            'delivery-schedule-list',
            'driver-assignments-create',
            'driver-assignments-edit',
            'driver-assignments-list',
            'driver-create',
            'driver-edit',
            'driver-list',
            'package-create',
            'package-edit',
            'package-list',
            'report-create',
            'report-edit',
            'report-list',
            'user-create',
            'user-edit',
            'user-list',
            'vehicle-assignments-create',
            'vehicle-assignments-edit',
            'vehicle-assignments-list',
            'vehicle-create',
            'vehicle-edit',
            'vehicle-list',
            'warehouse-create',
            'warehouse-edit',
            'warehouse-list'
        ]);

        $user->assignRole([$role->id]);
    }
}
