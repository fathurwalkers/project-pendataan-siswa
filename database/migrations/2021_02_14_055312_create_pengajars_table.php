<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajarsTable extends Migration
{
    public function up()
    {
        Schema::create('pengajar', function (Blueprint $table) {
            $table->id();
            
            $table->string('kode_pengajar');
            $table->string('kode_semester');
            $table->string('kode_kelas');
            $table->string('kode_matapelajaran');
            $table->string('nip_guru');

            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('matapelajaran_id');

            $table->foreign('semester_id')->references('id')->on('semester');
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreign('matapelajaran_id')->references('id')->on('matapelajaran');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengajar');
    }
}
