<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();

            $table->string('kode_pengajar');
            $table->string('kode_kelas');
            $table->string('kode_semester');
            $table->string('kode_matapelajaran');
            $table->string('nisn_siswa');
            $table->string('absen_siswa');
            $table->time('waktu_absen');
            $table->date('tanggal_absen');
            $table->string('status_absen')->nullable();

            // $table->unsignedBigInteger('semester_id');
            // $table->unsignedBigInteger('kelas_id');
            // $table->unsignedBigInteger('matapelajaran_id');
            // $table->unsignedBigInteger('pengajar_id');

            // $table->foreign('semester_id')->references('id')->on('semester');
            // $table->foreign('kelas_id')->references('id')->on('kelas');
            // $table->foreign('matapelajaran_id')->references('id')->on('matapelajaran');
            // $table->foreign('pengajar_id')->references('id')->on('pengajar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
