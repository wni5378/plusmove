<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'customer_id' => 1,
            'name' => fake('en_ZA')->firstName(),
            'surname' => fake('en_ZA')->lastName(),
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create(['name' => 'User']);

        $role->syncPermissions([
            'delivery-schedule-list'
        ]);

        $user->assignRole([$role->id]);
    }
}
