<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SchedulingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Cobie',
            'surname' => 'Smulders',
            'email' => 'scheduling@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => bcrypt('12345678')
        ]);

        $role = Role::create(['name' => 'Scheduling']);

        $role->syncPermissions([
            'customer-list',
            'delivery-schedule-create',
            'delivery-schedule-delete',
            'delivery-schedule-edit',
            'delivery-schedule-list',
            'driver-assignments-create',
            'driver-assignments-delete',
            'driver-assignments-edit',
            'driver-assignments-list',
            'driver-list',
            'package-list',
            'report-list',
            'user-list',
            'vehicle-assignments-create',
            'vehicle-assignments-delete',
            'vehicle-assignments-edit',
            'vehicle-assignments-list',
            'vehicle-list',
            'warehouse-create',
            'warehouse-edit',
            'warehouse-list'
        ]);

        $user->assignRole([$role->id]);
    }
}
