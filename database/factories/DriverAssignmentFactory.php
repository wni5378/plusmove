<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\DriverAssignment;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DriverAssignment>
 */
class DriverAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::all()->random()->id,
            'driver_id' => Driver::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'assigned_at' => fake()->dateTimeBetween('-18 hours'),
        ];
    }
}
