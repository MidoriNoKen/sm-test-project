<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleStatsTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id')->unique();
            $table->decimal('total_fuel_consumed', 10, 2)->nullable();
            $table->decimal('average_fuel_consumption', 10, 2)->nullable();
            $table->integer('total_service_schedules')->nullable();
            $table->integer('total_usage_histories')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_stats');
    }
}

