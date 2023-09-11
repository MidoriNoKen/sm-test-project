<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleUsageHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_usage_histories', function (Blueprint $table) {
            $table->id();
            $table->date('usage_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('mileage_start');
            $table->integer('mileage_end');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_usage_histories');
    }
}
