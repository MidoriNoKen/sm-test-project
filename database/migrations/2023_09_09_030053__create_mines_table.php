<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinesTable extends Migration
{
    public function up()
    {
        Schema::create('mines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id')->constrained('offices')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('telephone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mines');
    }
}
