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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_name');
            $table->string('reservation_email');
            $table->string('reservation_contact');
            $table->integer('reservation_attendees');
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->text('reservation_message')->nullable();
            $table->foreignId('dining_table_id')->nullable()->constrained('dining_tables')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('reservation_status', ['Pending', 'Completed', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
