<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{
    public function up()
    {
        Schema::create('semester', function (Blueprint $table) {
            $table->id();

            $table->string('kode_semester');
            $table->string('status_semester');
            $table->string('tahun_ajaran');
            $table->string('nip_kepsek')->nullable();

            // $table->unsignedBigInteger('detail_id')->nullable();

            // $table->foreign('detail_id')->references('id')->on('detail');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('semester');
    }
}
