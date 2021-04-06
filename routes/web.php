<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    })->name('home');
});

Route::fallback(function () {
    return "Maaf, halaman tidak ditemukan";
});
    
Route::get('/test', 'AdminController@test');
Route::get('testarray', 'AdminController@autoinputsiswa');

Route::prefix('/dashboard')->group(function () {
    Route::get('/', 'AdminController@index')->middleware('ceklogin')->name('dashboard');
    Route::get('/login', 'AdminController@login')->name('login');
    Route::get('/register', 'AdminController@register')->name('register');
    Route::post('/login', 'AdminController@postLogin')->name('postLogin');
    Route::post('/register', 'AdminController@postRegister')->name('postRegister');
    Route::post('/logout', 'AdminController@logout')->name('logout');

    // SISWA
    Route::get('/daftar-siswa', 'AdminController@daftarSiswa')->middleware('ceklogin')->name('daftar-siswa');
    Route::get('/tambah-siswa', 'AdminController@tambahSiswa')->middleware('ceklogin')->name('tambah-siswa');
    Route::post('/tambah-siswa', 'AdminController@post_tambahSiswa')->middleware('ceklogin')->name('post-tambah-siswa');
    Route::get('/detail-siswa/info/{idsiswa}', 'AdminController@biodata_siswa')->middleware('ceklogin')->name('biodata-siswa');
    Route::post('/detail-siswa/delete/{idsiswa}', 'AdminController@hapusSiswa')->middleware('ceklogin')->name('hapus-siswa');
    Route::get('/edit-siswa/{idsiswa}', 'AdminController@editSiswa')->middleware('ceklogin')->name('edit-siswa');
    Route::post('/update-siswa/{idsiswa}', 'AdminController@updateSiswa')->middleware('ceklogin')->name('update-siswa');

    // GURU
    Route::get('/daftar-guru', 'AdminController@daftarGuru')->middleware('ceklogin')->name('daftar-guru');
    Route::get('/tambah-guru', 'AdminController@tambahGuru')->middleware('ceklogin')->name('tambah-guru');
    Route::post('/tambah-guru', 'AdminController@post_tambahGuru')->middleware('ceklogin')->name('post-tambah-guru');
    Route::get('/detail-guru/info/{idguru}', 'AdminController@biodata_guru')->middleware('ceklogin')->name('biodata-guru');
    Route::post('/detail-guru/delete/{idguru}', 'AdminController@hapusGuru')->middleware('ceklogin')->name('hapus-guru');
    Route::get('/edit-guru/{idguru}', 'AdminController@editGuru')->middleware('ceklogin')->name('edit-guru');
    Route::post('/update-guru/{idguru}', 'AdminController@updateGuru')->middleware('ceklogin')->name('update-guru');
    Route::get('/total-nilai/{detailid}/{kelasid}/{matapelajaranid}', 'GuruController@total_nilai')->middleware('ceklogin')->name('daftar-total-nilai');
    Route::get('/printtest', 'GuruController@printnilai')->middleware('ceklogin')->name('print-test');

    // MATA PELAJARAN
    Route::get('/daftar-mata-pelajaran', 'AdminController@daftarMatapelajaran')->middleware('ceklogin')->name('daftar-matapelajaran');
    Route::get('/tambah-mata-pelajaran', 'AdminController@tambahMatapelajaran')->middleware('ceklogin')->name('tambah-matapelajaran');
    Route::post('/tambah-mata-pelajaran', 'AdminController@post_tambahMatapelajaran')->middleware('ceklogin')->name('post-tambah-matapelajaran');
    Route::get('/edit-mata-pelajaran/{idmatapelajaran}', 'AdminController@editMatapelajaran')->middleware('ceklogin')->name('edit-matapelajaran');
    Route::post('/update-matapelajaran/{idmatapelajaran}', 'AdminController@updateMatapelajaran')->middleware('ceklogin')->name('update-matapelajaran');
    Route::post('/hapus-matapelajaran/{idmatapelajaran}', 'AdminController@hapusMatapelajaran')->middleware('ceklogin')->name('hapus-matapelajaran');

    // KELAS
    Route::get('/daftar-kelas', 'AdminController@daftarKelas')->middleware('ceklogin')->name('daftar-kelas');
    // Route::get('/tambah-kelas', 'AdminController@tambahKelas')->middleware('ceklogin')->name('tambah-kelas');
    // Route::post('/tambah-kelas', 'AdminController@post_tambahKelas')->middleware('ceklogin')->name('post-tambah-kelas');
    Route::get('/daftar-siswa-kelas/{idkelas}', 'Admincontroller@daftarSiswaKelas')->middleware('ceklogin')->name('daftar-siswa-kelas');

    // SEMESTER
    Route::get('/daftar-semester', 'AdminController@daftarSemester')->middleware('ceklogin')->name('daftar-semester');
    Route::get('/tambah-semester', 'AdminController@tambahSemester')->middleware('ceklogin')->name('tambah-semester');
    Route::post('/tambah-semester', 'AdminController@post_tambahSemester')->middleware('ceklogin')->name('post-tambah-semester');

    // PENGAJAR
    Route::get('/daftar-pengajar', 'AdminController@daftarPengajar')->middleware('ceklogin')->name('daftar-pengajar');
    Route::get('/tambah-pengajar', 'AdminController@tambahPengajar')->middleware('ceklogin')->name('tambah-pengajar');
    Route::post('/post-tambah-pengajar', 'AdminController@post_tambahPengajar')->middleware('ceklogin')->name('post-tambah-pengajar');
    Route::post('/hapus-pengajar/{idpengajar}', 'AdminController@hapusPengajar')->middleware('ceklogin')->name('hapus-pengajar');
    Route::get('/edit-pengajar/{idpengajar}', 'AdminController@editPengajar')->middleware('ceklogin')->name('edit-pengajar');
    Route::post('/update-pengajar/{idpengajar}', 'AdminController@updatePengajar')->middleware('ceklogin')->name('update-pengajar');
    Route::get('/detail-pengajar/{idpengajar}', 'AdminController@detailPengajar')->middleware('ceklogin')->name('detail-pengajar');

    // PROFILE USER
    Route::get('/biodata-user/{iduser}', 'AdminController@profileuser')->middleware('ceklogin')->name('biodata-user');

    // DAFTAR INFORMASI USER
    Route::get('daftar-user-siswa', 'AdminController@daftarUserSiswa')->middleware('ceklogin')->name('daftar-user-siswa');
    Route::get('daftar-user-guru', 'AdminController@daftarUserGuru')->middleware('ceklogin')->name('daftar-user-guru');

    // MANAGEMENT UNTUK SISWA
    Route::prefix('/siswa')->group(function () {
        Route::get('/detail-siswa', 'SiswaController@detailSiswa')->middleware('ceklogin')->name('detail-siswa');
        Route::get('/detail-kelas', 'SiswaController@detailKelas')->middleware('ceklogin')->name('detail-kelas');
        Route::get('/detail-nilai-siswa', 'SiswaController@siswaDetailNilai')->middleware('ceklogin')->name('siswa-detail-nilai');
        Route::get('/detail-absensi-siswa', 'SiswaController@siswaDetailAbsensi')->middleware('ceklogin')->name('siswa-detail-absensi');
    });

    // MANAGEMENT UNTUK GURU
    Route::prefix('/guru')->group(function () {
        Route::get('/rekap-data-siswa', 'GuruController@rekapdatasiswa')->middleware('ceklogin')->name('rekap-data-siswa');
        Route::get('/detail-kelas/{idpengajar}/{idmatapelajaran}', 'GuruController@informasiDetailKelas')->middleware('ceklogin')->name('guru-detail-kelas');
        Route::get('/daftar-kelas-guru', 'GuruController@daftarKelasGuru')->middleware('ceklogin')->name('daftar-kelas-guru');
        Route::get('/daftar-input-nilai', 'GuruController@daftarInputNilai')->middleware('ceklogin')->name('daftar-input-nilai');
        Route::get('/input-nilai-siswa/{idkelas}/{idmatapelajaran}', 'GuruController@inputNilaiSiswa')->middleware('ceklogin')->name('input-nilai-siswa');
        Route::post('/input-nilai-siswa/{idkelas}/{idmatapelajaran}', 'GuruController@post_inputNilaiSiswa')->middleware('ceklogin')->name('post-input-nilai-siswa');
    });

    Route::get('/test-raport/idnilai', 'SiswaController@testRapor')->midlleware('ceklogin')->name('lihat-raport');
    
    // FAKER AUTO GENERATE DATA
    Route::get('/generate-siswa', 'AdminController@generate_siswa')->middleware('ceklogin');
    Route::get('/generate-guru', 'AdminController@generate_guru')->middleware('ceklogin');

    Route::get('/print-siswa', 'PrintController@print_daftarsiswa')->name('print-siswa');
    Route::get('/print-guru', 'PrintController@print_daftarguru')->name('print-guru');
});
