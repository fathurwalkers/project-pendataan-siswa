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
        // $pengajar = Pengajar::where('kelas_id', $users->detail->kelas->id)->get();
        $nilai = Nilai::where('detail_id', $users->detail->id)->get();
        if ($nilai->isEmpty()) {
            return back()->with('nilai_null', 'Maaf Nilai untuk siswa ini belum di masukkan!');
        }
        // dump($nilai);
        // dd($pengajar);
        return view('siswa.detail-nilai-siswa', compact('users', 'nilai'));
    }

    public function siswaDetailAbsensi()
    {
        $users = session('data_login');
        $absensi = Absensi::where('detail_id', $users->detail->id)->get();
        if ($absensi->isEmpty()) {
            return back()->with('absensi_null', 'Maaf absensi untuk siswa ini belum di masukkan!');
        }
        return view('siswa.detail-absensi-siswa', compact('users', 'absensi'));
    }

    public function testRapor()
    {
        $users = session('data_login');
        $data = Nilai::where('detail_id', $users->detail->id)->get();
        if ($data->isEmpty()) {
            return back()->with('nilai_null', 'Maaf Nilai untuk siswa ini belum di masukkan!');
        }
        $data2 = Detail::find($users->detail->id);
        $pdf = PDF::loadView('siswa.raport-siswa', [
            'data' => $data,
            'detail' => $data2
            ]);
        return $pdf->download('daftar-guru.pdf');
        // return $pdf->loadHTML('daftar-guru.pdf');
        // return view('siswa.raport-siswa', compact('users', 'nilai'));
    }

    public function lihatRapor()
    {
        $users = session('data_login');
        $data = Nilai::where('detail_id', $users->detail->id)->get();
        if ($data->isEmpty()) {
            return back()->with('nilai_null', 'Maaf Nilai untuk siswa ini belum di masukkan!');
        }
        $data2 = Detail::find($users->detail->id);
        $id_pengajar = $data[0];
        // dd($id_pengajar);
        $pengajar = Pengajar::where('id', $id_pengajar->pengajar_id)->first();
        // dd($pengajar);
        $pdf = PDF::loadView('siswa.raport-siswa', [
            'data' => $data,
            'detail' => $data2
        ]);
        return view('siswa.lihat-raport', compact('users', 'data', 'data2', 'pengajar'));
    }
}
