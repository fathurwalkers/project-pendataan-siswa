<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return "HALAMAN INDEX HOME";
    })->name('home');
});

Route::prefix('/dashboard')->group(function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/login', 'AdminController@login')->name('login');
    Route::get('/register', 'AdminController@register')->name('register');
    Route::post('/login', 'AdminController@postLogin')->name('postLogin');
    Route::post('/register', 'AdminController@postRegister')->name('postRegister');
    Route::post('/logout', 'AdminController@logout')->name('logout');

    // SISWA
    Route::get('/daftar-siswa', 'AdminController@daftarSiswa')->name('daftar-siswa');
    Route::get('/tambah-siswa', 'AdminController@tambahSiswa')->name('tambah-siswa');
    Route::post('/tambah-siswa', 'AdminController@post_tambahSiswa')->name('post-tambah-siswa');

    // GURU
    Route::get('/daftar-guru', 'AdminController@daftarGuru')->name('daftar-guru');
    Route::get('/tambah-guru', 'AdminController@tambahGuru')->name('tambah-guru');
    Route::post('/tambah-guru', 'AdminController@post_tambahGuru')->name('post-tambah-guru');

    // MATA PELAJARAN
    Route::get('/daftar-mata-pelajaran', 'AdminController@daftarMatapelajaran')->name('daftar-matapelajaran');
    Route::get('/tambah-mata-pelajaran', 'AdminController@tambahMatapelajaran')->name('tambah-matapelajaran');
    Route::post('/tambah-mata-pelajaran', 'AdminController@post_tambahMatapelajaran')->name('post-tambah-matapelajaran');

    // KELAS
    Route::get('/daftar-kelas', 'AdminController@daftarKelas')->name('daftar-kelas');
    Route::get('/tambah-kelas', 'AdminController@tambahKelas')->name('tambah-kelas');
    Route::post('/tambah-kelas', 'AdminController@post_daftarKelas')->name('post-tambah-kelas');

    // DAFTAR INFORMASI USER
    Route::get('daftar-user-siswa', 'AdminController@daftarUserSiswa')->name('daftar-user-siswa');
    Route::get('daftar-user-guru', 'AdminController@daftarUserGuru')->name('daftar-user-guru');
});
