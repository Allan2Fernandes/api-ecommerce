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
        Schema::create('wishlists', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->foreignUuid('user_id')
                ->constrained('users')
                ->restrictOnDelete();
            $table->timestamps();
        });

        Schema::create('wishlist_items', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('wishlist_id')
                ->constrained('wishlists')
                ->restrictOnDelete();
            $table->foreignUuid('product_id')
                ->constrained('products')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
