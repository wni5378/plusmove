<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $provincesData = json_decode(file_get_contents(asset('data-json/provinces.json')), true);
        $provincesCentresData = json_decode(file_get_contents(asset('data-json/provinces-centres.json')), true);
        $provincesCentresSuburbs = file_get_contents(asset('data-json/provinces-centres-suburbs.json'));
        $provincesCentresSuburbsData = json_decode($provincesCentresSuburbs, true);
        $selectedProvince = fake()->randomElement($provincesData);
        $selectedCentre = fake()->randomElement($provincesCentresData[$selectedProvince]);
        $selectedSuburb = fake()->randomElement($provincesCentresSuburbsData[$selectedProvince][$selectedCentre]);
        $user = User::whereNotIn('id', [1, 2, 3, 4])->inRandomOrder()->first();
        $names = explode(' ', $user->name);
        $firstName = $lastName = '';
        if (count($names) === 2) {
            $firstName = $names[0];
            $lastName = $names[1];
        } else if (count($names) === 3) {
            $firstName = $names[1];
            $lastName = $names[2];
        }
        $emailAddress = strtolower($firstName) . '.' . strtolower($lastName) . '@' . fake('en_ZA')->domainName;
        $phone = preg_replace('/[()\s+-]/', '', fake('en_ZA')->phoneNumber);
        if (str_starts_with($phone, '27')) {
            $phone = '0' . substr($phone, 2);
        }
        return [
            'user_id' => $user->id,
            'name' => $firstName,
            'surname' => $lastName,
            'phone' => $phone,
            'email' => $emailAddress,
            'address_line_1' => fake('en_ZA')->streetAddress(),
            'address_line_2' => $selectedSuburb,
            'region' => $selectedProvince,
            'country' => 'South Africa',
            'postal_code' => fake('en_ZA')->postcode(),
        ];
    }
}
