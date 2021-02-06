<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nip_nisn');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('foto')->nullable();
            $table->string('role_status');
            $table->string('siswa_kelas')->nullable();
            $table->string('siswa_status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail');
    }
}
