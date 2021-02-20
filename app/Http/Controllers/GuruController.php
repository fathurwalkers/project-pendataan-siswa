<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Login;
use App\Detail;
use App\Absensi;
use App\Kelas;
use App\Matapelajaran;
use App\Nilai;
use App\Semester;
use App\Pengajar;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr as Randoms;

class GuruController extends Controller
{
    public function rekapdatasiswa()
    {
        return view('guru.rekap-data-siswa');
    }

    public function daftarKelasGuru($idpengajar)
    {
        //
    }

    public function informasiDetailKelas($idpengajar)
    {
        $users = session('data_login');
        $guru_id = $idpengajar;
        $pengajar = Pengajar::where('detail_id', $guru_id)->firstOrFail();
        $kelas_id = $pengajar->kelas_id;
        $siswa = Detail::where('role_status', 'siswa')->where('kelas_id', $kelas_id)->get();
        return view('guru.daftar-kelas-guru', compact('users', 'pengajar', 'siswa'));
    }
}
