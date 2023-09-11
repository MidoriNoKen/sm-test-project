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
        Schema::create('fuel_consumptions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('fuel_consumed', 10, 2);
            $table->decimal('fuel_amount', 8, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_consumptions');
    }
};
