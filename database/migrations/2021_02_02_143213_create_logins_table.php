<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginsTable extends Migration
{
    public function up()
    {
        Schema::create('login', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('level');
            $table->text('token');
            $table->unsignedBigInteger('detail_id')->nullable();
            $table->foreign('detail_id')->references('id')->on('detail')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('login');
    }
}
