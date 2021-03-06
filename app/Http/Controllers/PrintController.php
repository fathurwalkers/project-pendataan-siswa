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
use PDF;

class PrintController extends Controller
{
    public function print_daftarsiswa()
    {
        $users = session('data_login');
        $data = Detail::where('role_status', 'siswa')->get();
        $pdf = PDF::loadView('print.print-daftar-siswa', ['data' => $data]);
        return $pdf->download('daftar-siswa.pdf');
    }

    public function print_daftarguru()
    {
        $users = session('data_login');
        $data = Detail::where('role_status', 'guru')->get();
        $pdf = PDF::loadView('print.print-daftar-guru', ['data' => $data]);
        return $pdf->download('daftar-guru.pdf');
    }
}
