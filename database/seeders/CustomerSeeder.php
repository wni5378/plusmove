<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provincesData = json_decode(file_get_contents(asset('data-json/provinces.json')), true);
        $provincesCentres = file_get_contents(asset('data-json/provinces-centres.json'));
        $provincesCentresData = json_decode($provincesCentres, true);
        $provincesCentresSuburbsData = json_decode(file_get_contents(asset('data-json/provinces-centres-suburbs.json')), true);
        $selectedProvince = fake()->randomElement($provincesData);
        $selectedCentre = fake()->randomElement($provincesCentresData[$selectedProvince]);
        $selectedSuburb = fake()->randomElement($provincesCentresSuburbsData[$selectedProvince][$selectedCentre]);
        $phone = preg_replace('/[()\s+-]/', '', fake('en_ZA')->phoneNumber);
        $_user = User::where('customer_id', 1)->first();
        Customer::create([
            'user_id' => $_user->id,
            'name' => $_user->name,
            'surname' => $_user->surname,
            'phone' => $phone,
            'email' => $_user->email,
            'address_line_1' => fake('en_ZA')->streetAddress(),
            'address_line_2' => $selectedSuburb,
            'region' => $selectedProvince,
            'country' => 'South Africa',
            'postal_code' => fake('en_ZA')->postcode(),
        ]);

        $role = Role::create(['name' => 'Customer']);

        $role->syncPermissions([
            'customer-list',
            'delivery-schedule-list'
        ]);

        $_user->assignRole([$role->id]);
    }
}
