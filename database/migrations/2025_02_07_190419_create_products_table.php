<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
 	     $table->string('name'); // Product Name
                 $table->string('name'); // Product Name
            $table->unsignedBigInteger('store_id');  // Store ID
            $table->unsignedBigInteger('category_id'); // Category ID
            $table->unsignedBigInteger('merchant_id'); // Merchant ID
            $table->timestamps();
             $table->unique(['store_id', 'category_id', 'merchant_id', 'name'], 'unique_product_constraint');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
