<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class MerchantSeeder extends Seeder
{
    public function run(): void
    {
        $merchantRole = Role::firstOrCreate(['name' => 'merchant']);
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            $email = "merchant{$i}@" . $faker->freeEmailDomain; // Generates a unique email

            $merchant = User::firstOrCreate(
                ['email' => $email], 
                [
                    'name' => $faker->name,
                    'password' => Hash::make('password'), // Default password
                ]
            );

            // Remove any previous roles and assign only "merchant"
            $merchant->syncRoles([$merchantRole]);
        }

        $this->command->info('10 Merchant users created successfully with dynamic emails.');
    }
}
