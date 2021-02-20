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
        $users = session('data_login');
        $pengajar_id = $idpengajar;
        $pengajar = Pengajar::where('detail_id', $pengajar_id)->get();
        // dd($pengajar->detail->nama_lengkap);
        return view('guru.daftar-kelas-guru', compact('users', 'pengajar'));
    }

    public function informasiDetailKelas($idpengajar, $idmatapelajaran)
    {
        $users = session('data_login');
        $guru_id = $idpengajar;
        $matapelajaran_id = $idmatapelajaran;
        $pengajar = Pengajar::where('detail_id', $guru_id)->where('matapelajaran_id', $matapelajaran_id)->firstOrFail();
        $kelas_id = $pengajar->kelas_id;
        $siswa = Detail::where('role_status', 'siswa')->where('kelas_id', $kelas_id)->get();
        return view('guru.detail-kelas', compact('users', 'pengajar', 'siswa'));
    }

    public function inputNilaiSiswa()
    {
        $users = session('data_login');
        $guru_id = $users->detail->id;
        $pengajar = Pengajar::where('detail_id', $guru_id)->firstOrFail();
        $kelas_id = $pengajar->kelas->id;
        $matapelajaran_id = $pengajar->matapelajaran->id;
        $siswa = Detail::where('role_status', 'siswa')->where('kelas_id', $kelas_id)->get();
        return view('guru.input-nilai-siswa', compact('users', 'pengajar', 'siswa'));
    }
}
