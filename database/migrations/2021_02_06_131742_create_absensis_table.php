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
