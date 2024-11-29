<?php

namespace Database\Factories;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'report_type' => fake()->randomElement(['delivery', 'vehicle', 'driver', 'customer']),
            'detail' => fake('en_ZA')->sentence(7, false),
            'user_id' => User::all()->random()->id
        ];
    }
}
