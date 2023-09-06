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
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignId('dining_table_id')->constrained('dining_tables')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('food_orders')->constrained('food_menus')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('quantity')->default(1);
            $table->boolean('isPaid')->default(false);
            $table->enum('order_status', ['Preparing', 'Completed'])->default('Preparing');
            $table->string('contacts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_orders');
    }
};
