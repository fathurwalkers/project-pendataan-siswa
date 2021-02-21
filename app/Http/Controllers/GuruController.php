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

    public function daftarKelasGuru()
    {
        $users = session('data_login');
        $pengajar_id = $users->detail->id;
        $pengajar = Pengajar::where('detail_id', $pengajar_id)->get();
        // dd($pengajar->detail->nama_lengkap);
        return view('guru.daftar-kelas-guru', compact('users', 'pengajar'));
    }

    public function informasiDetailKelas($idpengajar, $idmatapelajaran)
    {
        $users = session('data_login');
        $guru_id = $users->detail->id;
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

    public function post_inputNilaisiswa(Request $request)
    {
        $users = session('data_login');
        $pengajar = Pengajar::where('detail_id', $users->detail->id)->firstOrFail();
        $collect = collect($request->increment);
        $countRequest = $collect->count();
        // dd($countRequest);
        $i = 1;
        $k = 1;
        $nilai_request = $request->nilai;
        // $nilai_request .= $i;
        $idsiswa_request = $request->idsiswa;
        // $idsiswa_request .= $k;
        // for ($j=1;$j>$countRequest;$j++) {
        foreach ($request->increment as $items) {
            // $siswa = Detail::where('role_status', 'siswa')->where('kelas_id', $pengajar->kelas->id)->firstOrFail();
            $nilai = new Nilai;
            $saveNilai = $nilai->create([
                    'kode_pengajar' => $pengajar->kode_pengajar,
                    'kode_kelas' => $pengajar->kelas->kode_kelas,
                    'kode_matapelajaran' => $pengajar->matapelajaran->kode_matapelajaran,
                    'kode_semester' => $pengajar->semester->kode_semester,
                    'nilai_siswa' => $request->nilai..$i++,
                    'waktu_nilai' => now(),
                    'tanggal_nilai' => now(),
                    'status_nilai' => 'Aman',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            $saveNilai->pengajar()->associate($pengajar->id);
            $saveNilai->detail()->associate($request->idsiswa..$i++);
            $saveNilai->save();
        }
        // }
        // dd($saveNilai);
        die;
        return redirect()->route('daftar-kelas-guru');
    }
}
