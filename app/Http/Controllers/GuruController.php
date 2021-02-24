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
        $cariPengajarKelas = Pengajar::where('detail_id', $pengajar_id)->get();
        // if ($cariPengajarKelas->isEmpty()) {
        //     return redirect()->route('dashboard')->with('tdkadakelas', 'Data Kelas pada Guru ini tidak ada!');
        // }
        switch ($cariPengajarKelas) {
            case $cariPengajarKelas->isEmpty():
                return redirect()->route('dashboard')->with('tdkadakelas', 'Data Kelas pada Guru ini tidak ada!');
                break;
            case $cariPengajarKelas->isNotEmpty():
                $pengajar = Pengajar::where('detail_id', $pengajar_id)->get();
                return view('guru.daftar-kelas-guru', compact('users', 'pengajar'));
                break;
        }
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

    public function daftarInputNilai()
    {
        $users = session('data_login');
        $caripengajar = Pengajar::where('detail_id', $users->detail->id)->get();
        switch ($caripengajar) {
            case $caripengajar->isEmpty():
                return redirect()->route('dashboard')->with('tidakditemukan', 'Data pengajar tidak ada untuk Guru ini.');
                break;
            case $caripengajar->isNotEmpty():
                $pengajar = Pengajar::where('detail_id', $users->detail->id)->get();
                $detail_pengajar = Pengajar::where('detail_id', $users->detail->id)->firstOrFail();
                return view('guru.daftar-input-kelas', compact('users', 'pengajar', 'detail_pengajar'));
                break;
        }
    }

    public function inputNilaiSiswa($idkelas, $idmatapelajaran)
    {
        $users = session('data_login');
        $guru_id = $users->detail->id;
        $kelas_id = $idkelas;
        $matapelajaran_id = $idmatapelajaran;
        $pengajar = Pengajar::where('detail_id', $guru_id)->where('kelas_id', $kelas_id)->where('matapelajaran_id', $matapelajaran_id)->firstOrFail();
        $siswa = Detail::where('role_status', 'siswa')->where('kelas_id', $kelas_id)->get();
        return view('guru.input-nilai-siswa', compact('users', 'pengajar', 'siswa'));
    }

    public function post_inputNilaisiswa(Request $request, $idkelas, $idmatapelajaran)
    {
        $users = session('data_login');
        $matapelajaran_id = $idmatapelajaran;
        $pengajar = Pengajar::where('detail_id', $users->detail->id)->where('kelas_id', $idkelas)->where('matapelajaran_id', $matapelajaran_id)->firstOrFail();
        $kelas = Kelas::where('id', $idkelas)->firstOrFail();
        $matapelajaran = Matapelajaran::where('id', $request->matapelajaranid)->firstOrFail();
        $i = 1;
        $k = 1;
        $tugas_req = 1;
        $absensi_req = 1;
        $uts_req = 1;
        $uas_req = 1;
        $nilai_request = $request->nilai;
        $idsiswa_request = $request->idsiswa;
        foreach ($request->increment as $items) {
            $nilai = new Nilai;
            $saveNilai = $nilai->create([
                    'kode_pengajar' => $pengajar->kode_pengajar,
                    'kode_kelas' => $kelas->kode_kelas,
                    'kode_matapelajaran' => $matapelajaran->kode_matapelajaran,
                    'kode_semester' => $pengajar->semester->kode_semester,
                    'nilai_siswa_tugas' => $request->nilai_siswa_tugas[$tugas_req++],
                    'nilai_siswa_absensi' => $request->nilai_siswa_absensi[$absensi_req++],
                    'nilai_siswa_uts' => $request->nilai_siswa_uts[$uts_req++],
                    'nilai_siswa_uas' => $request->nilai_siswa_uas[$uas_req++],
                    'nilai_ratarata' => null,
                    'waktu_nilai' => now(),
                    'tanggal_nilai' => now(),
                    'status_nilai' => 'Aman',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            $saveNilai->pengajar()->associate($pengajar->id);
            $saveNilai->matapelajaran()->associate($pengajar->matapelajaran->id);
            $saveNilai->detail()->associate($request->idsiswa[$k++]);
            $saveNilai->save();
            $nilaiBaru = Nilai::where('id', $saveNilai->id)->firstOrFail();
            $tugas = intval($nilaiBaru->nilai_siswa_tugas);
            $absensi = intval($nilaiBaru->nilai_siswa_absensi);
            $uts = intval($nilaiBaru->nilai_siswa_uts);
            $uas = intval($nilaiBaru->nilai_siswa_uas);
            $nilaiRatarata = $tugas + $absensi + $uts + $uas;
            $cariNilaiBaru = Nilai::where('id', $nilaiBaru->id)->update([
                'nilai_ratarata' => $nilaiRatarata,
                'updated_at' => now()
            ]);
        }
        return redirect()->route('daftar-kelas-guru');
    }
}
