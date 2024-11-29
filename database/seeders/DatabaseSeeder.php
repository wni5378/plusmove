<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $this->call([
            PermissionTableSeeder::class,
            AdminUserSeeder::class,
            ManagerUserSeeder::class,
            UserSeeder::class,
            SchedulingUserSeeder::class,
            DriverSeeder::class,
            VehicleSeeder::class,
            CustomerSeeder::class,
            PackageSeeder::class,
            ReportSeeder::class,
            DriverAssignmentSeeder::class,
            VehicleAssignmentSeeder::class,
            DeliveryScheduleSeeder::class,
            WarehouseSeeder::class,
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
