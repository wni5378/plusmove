<?php

namespace Database\Seeders;

use App\Models\VehicleAssignment;
use Illuminate\Database\Seeder;

class VehicleAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleAssignment::factory(1)->create();
    }
}
