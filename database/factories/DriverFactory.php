<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('en_ZA')->firstName(),
            'surname' => fake('en_ZA')->lastName(),
            'id_number' => fake('en_ZA')->idNumber()
        ];
    }
}
