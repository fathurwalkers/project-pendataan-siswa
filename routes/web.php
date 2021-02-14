<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return "HALAMAN INDEX HOME";
    })->name('home');
});

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

    // GURU
    Route::get('/daftar-guru', 'AdminController@daftarGuru')->middleware('ceklogin')->name('daftar-guru');
    Route::get('/tambah-guru', 'AdminController@tambahGuru')->middleware('ceklogin')->name('tambah-guru');
    Route::post('/tambah-guru', 'AdminController@post_tambahGuru')->middleware('ceklogin')->name('post-tambah-guru');

    // MATA PELAJARAN
    Route::get('/daftar-mata-pelajaran', 'AdminController@daftarMatapelajaran')->middleware('ceklogin')->name('daftar-matapelajaran');
    Route::get('/tambah-mata-pelajaran', 'AdminController@tambahMatapelajaran')->middleware('ceklogin')->name('tambah-matapelajaran');
    Route::post('/tambah-mata-pelajaran', 'AdminController@post_tambahMatapelajaran')->middleware('ceklogin')->name('post-tambah-matapelajaran');

    // KELAS
    Route::get('/daftar-kelas', 'AdminController@daftarKelas')->middleware('ceklogin')->name('daftar-kelas');
    Route::get('/tambah-kelas', 'AdminController@tambahKelas')->middleware('ceklogin')->name('tambah-kelas');
    Route::post('/tambah-kelas', 'AdminController@post_tambahKelas')->middleware('ceklogin')->name('post-tambah-kelas');

    // DAFTAR INFORMASI USER
    Route::get('daftar-user-siswa', 'AdminController@daftarUserSiswa')->middleware('ceklogin')->name('daftar-user-siswa');
    Route::get('daftar-user-guru', 'AdminController@daftarUserGuru')->middleware('ceklogin')->name('daftar-user-guru');

    // MANAGEMENT UNTUK SISWA
    Route::prefix('/siswa')->group(function () {
        Route::get('/detail-siswa', 'SiswaController@detailSiswa')->middleware('ceklogin')->name('detail-siswa');
    });

    // MANAGEMENT UNTUK GURU
    Route::prefix('/guru')->group(function () {
        Route::get('/rekap-data-siswa', 'GuruController@rekapdatasiswa')->middleware('ceklogin')->name('rekap-data-siswa');
    });

    // FAKER AUTO GENERATE DATA SISWA
    Route::get('/generate-siswa', 'AdminController@generate_siswa');
});
