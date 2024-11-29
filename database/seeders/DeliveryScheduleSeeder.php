<?php

namespace Database\Seeders;

use App\Models\DeliverySchedule;
use Illuminate\Database\Seeder;

class DeliveryScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliverySchedule::factory(1)->create();
    }
}
