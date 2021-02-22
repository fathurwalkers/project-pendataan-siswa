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

class SiswaController extends Controller
{
    public function detailSiswa()
    {
        $users = session('data_login');
        return view('siswa.detail-siswa', compact('users'));
    }

    public function detailKelas()
    {
        $users = session('data_login');
        $kode_kelas = $users->detail->kelas->id;
        $detail_kelas = Detail::where('kelas_id', $kode_kelas)->get();
        return view('siswa.detail-kelas', compact('users', 'detail_kelas'));
    }

    public function siswaDetailNilai()
    {
        $users = session('data_login');
        $nilai = Nilai::where('detail_id', $users->detail->id)->get();
        dd($nilai);
        return view('siswa.detail-nilai-siswa', compact('users', 'nilai'));
    }
}
