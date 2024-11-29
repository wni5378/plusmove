<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::all()->random()->id,
            'tracking_number' => fake()->unique()->numerify('PM##########'),
            'weight' => fake()->randomNumber(4, true),
            'dimension_x' => fake()->randomNumber(3),
            'dimension_y' => fake()->randomNumber(3),
            'dimension_z' => fake()->randomNumber(3),
            'status' => fake()->randomElement(['collected', 'at-warehouse', 'onboard-vehicle', 'returned-warehouse', 'delivered']),
            'collected_at' => fake()->dateTimeBetween('-1 week', '-3 days')->format('Y-m-d H:i:s'),
            'delivered_at' => fake()->dateTimeBetween('-3 days')->format('Y-m-d H:i:s'),
        ];
    }
}
