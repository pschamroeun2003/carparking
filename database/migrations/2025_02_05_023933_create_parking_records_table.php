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
        Schema::create('parking_records', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('user_id')->constrained()->onDelete('cascade');
           $table->unsignedBigInteger('vehicle_id')->constrained()->onDelete('cascade');
           $table->unsignedBigInteger('parking_slot_id')->constrained()->onDelete('cascade');
           $table->timestamp('entry_time');
           $table->timestamp('exit_time')->nullable();
           $table->decimal('amount_paid', 10, 2)->nullable();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_records');
    }
};
