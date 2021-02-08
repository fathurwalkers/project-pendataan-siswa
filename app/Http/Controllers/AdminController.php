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

class AdminController extends Controller
{
    public function index()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        return view('admin.index', [
            'users' => $users
        ]);
    }

    public function login()
    {
        // $users = session('data_login');
        if (session('data_login')) {
            return redirect('/dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function register()
    {
        if (session('data_login')) {
            return redirect('/dashboard');
        }
        return view('admin.register');
    }

    public function logout(Request $request)
    {
        // Alert::question('Yakin ingin Keluar?');
        $request->session()->flush();
        return redirect()->route('dashboard');
    }

    public function postLogin(Request $request)
    {
        $data_login = Login::where('username', $request->username)->firstOrFail();
        $cek_password = Hash::check($request->password, $data_login->password);
        // $cek_level = $data_login->level;

        if ($data_login) {
            if ($cek_password) {
                $users = session(['data_login' => $data_login]);
                return redirect()->route('dashboard');
            }
        }
        return redirect('/dashboard/login')->withInput();
    }

    public function postRegister(Request $request)
    {
        $login_data = new Login;
        $validatedLogin = $request->validate([
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        $hashPassword = Hash::make($request->password, [
            'rounds' => 12,
        ]);
        $token = Str::random(16);
        $level = "admin";
        $login_data = Login::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => $hashPassword,
            'level' => $level,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $login_data->save();
        return redirect('/dashboard/login')->with('berhasil_register', 'Berhasil melakukan registrasi');
    }

    // ---------------------------------------------------------------------------------------

    public function daftarSiswa()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('daftar-siswa');
        }
        return view('admin.daftar-siswa', compact('users'));
    }

    public function daftarGuru()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('daftar-guru');
        }
        return view('admin.daftar-guru', compact('users'));
    }

    public function daftarMatapelajaran()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('daftar-matapelajaran');
        }
        return view('admin.daftar-mata-pelajaran', compact('users'));
    }

    public function daftarKelas()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('daftar-kelas');
        }
        return view('admin.daftar-kelas', compact('users'));
    }

    // ---------------------------------------------------------------------------------------

    public function tambahSiswa()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        return view('admin.tambah-siswa', compact('users'));
    }

    public function tambahGuru()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        return view('admin.tambah-guru', compact('users'));
    }

    public function tambahMatapelajaran()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        return view('admin.tambah-mata-pelajaran', compact('users'));
    }

    public function tambahKelas()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        return view('admin.tambah-kelas', compact('users'));
    }

    // ---------------------------------------------------------------------------------------

    public function post_tambahSiswa(Request $request)
    {
        dump($request->nama_lengkap);
        dump($request->nip_nisn);
        dump($request->jenis_kelamin);
        dump($request->role_status);
        die;
        // $data_siswa = new Login;
        // $validatedLogin = $request->validate([
        //     'email' => 'required',
        //     'username' => 'required',
        //     'password' => 'required'
        // ]);
        // $hashPassword = Hash::make($request->password, [
        //     'rounds' => 12,
        // ]);
        // $token = Str::random(16);
        // $level = "admin";
        // $data_siswa = Login::create([
        //     '' => ,
        // ]);
        // $data_siswa->save();
        // return redirect('/dashboard/login')->with('berhasil_register', 'Berhasil melakukan registrasi');
    }

    public function post_tambahGuru(Request $request)
    {
        //
    }

    public function post_tambahMatapelajaran(Request $request)
    {
        //
    }

    public function post_tambahKelas(Request $request)
    {
        //
    }
}
