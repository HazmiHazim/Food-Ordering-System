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
        Schema::create('promotion_discounts', function (Blueprint $table) {
            $table->id();
            $table->uuid('coupon_code')->unique();
            $table->string('coupon_name');
            $table->decimal('discount', 5, 2);
            $table->foreignId('event_id')->constrained('promotion_events')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('redeem_status', [
                'Not Redeemed',
                'Redeemed',
                'Expired',
                'Cancelled',
            ])->default('Not Redeemed');
            $table->dateTime('validity');
            $table->timestamp('date_redeemed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_discounts');
    }
};
