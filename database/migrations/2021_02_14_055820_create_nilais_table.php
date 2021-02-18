<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();

            $table->string('kode_pengajar');
            $table->string('kode_kelas');
            $table->string('kode_matapelajaran');
            $table->string('kode_semester');
            $table->string('nisn_siswa');
            $table->string('nilai_siswa');
            $table->time('waktu_nilai');
            $table->date('tanggal_nilai');
            $table->string('status_nilai');

            $table->unsignedBigInteger('pengajar_id');
            $table->foreign('pengajar_id')->references('id')->on('pengajar');

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
        Schema::dropIfExists('nilai');
    }
}
