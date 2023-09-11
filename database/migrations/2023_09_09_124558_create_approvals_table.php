<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsTable extends Migration
{
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->string('status');
            $table->timestamps();

            $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('approver_id')->constrained('approvers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('approvals');
    }
}
