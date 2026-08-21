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
        Schema::create('reviews', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('explanation');
            $table->foreignUuid('user_id')
                ->after('id')
                ->constrained('users')
                ->restrictOnDelete();
            $table->foreignUuid('product_id')
                ->after('id')
                ->constrained('product')
                ->restrictOnDelete();
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
