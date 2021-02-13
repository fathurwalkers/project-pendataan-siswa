<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function detailSiswa()
    {
        $users = session('data_login');
        return view('siswa.detail-siswa', compact('users'));
    }
}
