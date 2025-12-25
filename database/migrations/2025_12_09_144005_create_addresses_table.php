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
          Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            // Relation to a user (nullable for visitor orders)
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            
            // Relation to an order or product (optional)
            $table->uuid('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->uuid('product_id')->nullable(); // optional, for product/warehouse addresses
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            // Type of address
            $table->enum('type', ['shipping', 'billing', 'warehouse', 'other'])->default('shipping');

            // Address fields
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('country', 3); // ISO code (e.g., US, CA)

            // Optional contact info
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
