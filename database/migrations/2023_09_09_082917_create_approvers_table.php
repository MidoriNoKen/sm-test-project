<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproversTable extends Migration
{
    public function up()
    {
        Schema::create('approvers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('position');
            $table->string('user_type')->default('approver'); // Tambahkan nilai default 'approver'
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('office_id')->constrained('offices')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('approvers');
    }
}
