<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure roles exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $merchantRole = Role::firstOrCreate(['name' => 'merchant']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);

        // Create Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => bcrypt('password')]
        );
        $admin->assignRole($adminRole);

        // Create Merchant User
        $merchant = User::firstOrCreate(
            ['email' => 'merchant@example.com'],
            ['name' => 'Merchant User', 'password' => bcrypt('password')]
        );
        $merchant->assignRole($merchantRole);
    }
}
