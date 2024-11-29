<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\DeliverySchedule;
use App\Models\DriverAssignment;
use App\Models\Package;
use App\Models\User;
use App\Models\VehicleAssignment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DeliverySchedule>
 */
class DeliveryScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'package_id' => Package::all()->random()->id,
            'customer_id' => Customer::all()->random()->id,
            'driver_assignment_id' => DriverAssignment::all()->random()->id,
            'vehicle_assignment_id' => VehicleAssignment::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'delivery_type' => fake()->randomElement(['collection', 'delivery']),
            'delivery_notes' => fake()->boolean(75) ? fake()->sentence(10) : null,
            'assigned_at' => fake()->dateTimeBetween('-1 week', '-5 days')->format('Y-m-d H:i:s'),
            'collected_at' => fake()->dateTimeBetween('-1 week', '-3 days')->format('Y-m-d H:i:s'),
            'delivered_at' => fake()->dateTimeBetween('-3 days')->format('Y-m-d H:i:s')
        ];
    }
}
