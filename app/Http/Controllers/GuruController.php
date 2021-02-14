<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function rekapdatasiswa()
    {
        return view('guru.rekap-data-siswa');
    }
}
