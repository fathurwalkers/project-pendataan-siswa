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
            $table->string('kode_semester')->nullable();
            $table->string('kode_kelas')->nullable();
            $table->string('kode_matapelajaran')->nullable();
            $table->string('nip_guru')->nullable();

            $table->unsignedBigInteger('semester_id')->nullable();
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->unsignedBigInteger('matapelajaran_id')->nullable();
            $table->unsignedBigInteger('detail_id')->nullable();

            $table->foreign('semester_id')->references('id')->on('semester');
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreign('matapelajaran_id')->references('id')->on('matapelajaran');
            $table->foreign('detail_id')->references('id')->on('detail');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengajar');
    }
}
