<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('approval_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('required_approvals');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('approval_levels');
    }
}
