<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('office_id')->constrained('offices')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mine_id')->constrained('mines')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}

