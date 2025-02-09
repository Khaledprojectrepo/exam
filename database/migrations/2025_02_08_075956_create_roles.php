<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

return new class extends Migration {
    public function up(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'merchant']);
        Role::create(['name' => 'customer']);
    }

    public function down(): void
    {
        Role::whereIn('name', ['admin', 'merchant', 'customer'])->delete();
    }
};
