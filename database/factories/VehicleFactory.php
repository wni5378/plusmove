<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carMakes = ['Toyota', 'Hyundai'];
        $carModels = [
            'Toyota' => ['Hilux', 'Corolla Commercial'],
            'Hyundai' => ['H-100 Chassis Cab', 'EX-8 Van Body']
        ];
        $carMake = fake()->randomElement($carMakes);
        $carModel = fake()->randomElement($carModels[$carMake]);
        $registrationNumber = strtoupper(fake()->randomLetter()) . strtoupper(fake()->randomLetter()) . ' ';
        $registrationNumber .= strtoupper(fake()->randomLetter()) . strtoupper(fake()->randomLetter()) . ' ';
        $registrationNumber .= fake()->randomNumber(2) . ' ';
        $registrationNumber .= fake()->randomElement(['GP', 'ZN', 'CT', 'LP']);
        $registrationNumber = str_replace(' ', '', $registrationNumber);
        return [
            'make' => $carMake,
            'model' => $carModel,
            'year' => fake()->dateTimeBetween('-3 years')->format('Y'),
            'registration_number' => $registrationNumber,
            'mileage' => fake()->randomNumber(5),
        ];
    }
}
