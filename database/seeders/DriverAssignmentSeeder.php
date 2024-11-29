<?php

namespace Database\Seeders;

use App\Models\DriverAssignment;
use Illuminate\Database\Seeder;

class DriverAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DriverAssignment::factory(1)->create();
    }
}
