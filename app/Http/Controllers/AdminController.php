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
            return redirect()->route('login');
        }
        $daftarsiswa = Detail::where('role_status', 'siswa')->latest()->get();
        return view('admin.daftar-siswa', compact('users', 'daftarsiswa'));
    }

    public function daftarGuru()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        $daftarguru = Detail::where('role_status', 'guru')->latest()->get();
        return view('admin.daftar-guru', compact('users', 'daftarguru'));
    }

    public function daftarMatapelajaran()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        $matapelajaran = Matapelajaran::latest()->get();
        return view('admin.daftar-mata-pelajaran', compact('users', 'matapelajaran'));
    }

    public function daftarKelas()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        $kelas = Kelas::latest()->get();
        return view('admin.daftar-kelas', compact('users', 'kelas'));
    }

    public function daftarUserSiswa()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        $user_siswa = Login::where('level', 'siswa')->latest()->get();
        return view('admin.daftar-user-siswa', compact('users', 'user_siswa'));
    }

    public function daftarUserGuru()
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        $user_guru = Login::where('level', 'guru')->latest()->get();
        return view('admin.daftar-user-guru', compact('users', 'user_guru'));
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
        $detail_siswa = new Detail;
        $extFile = $request->foto->getClientOriginalExtension();
        $randomGambar = Str::random(6);
        $namaFile = 'image-'.$randomGambar.".".$extFile;
        $path = $request->foto->move('image', $namaFile);
        $pathGambar = 'image/'. $namaFile;
        $saveDetail = $detail_siswa->create([
            'nama_lengkap' => $request->nama_lengkap,
            'nip_nisn' => $request->nip_nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'foto' => $pathGambar,
            'role_status' => $request->role_status,
            'siswa_kelas' => $request->siswa_kelas,
            'siswa_status' => $request->siswa_status,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $saveDetail->save();
        
        $login_siswa = new Login;
        $passwordSiswa = Str::random(5);
        $userSiswa = $request->nip_nisn;
        $token = Str::random(16);
        $level = "siswa";
        
        $login_siswa = Login::create([
            'email' => $userSiswa.'@siakad.com',
            'username' => $userSiswa,
            'password' => $passwordSiswa,
            'level' => $level,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now()
            ]);
        $id_detailbaru = intval($saveDetail->id);
        $login_siswa->detail()->associate($id_detailbaru);
        $login_siswa->save();

        return redirect()->route('daftar-siswa');
    }

    public function post_tambahGuru(Request $request)
    {
        $detail_guru = new Detail;
        $extFile = $request->foto->getClientOriginalExtension();
        $randomGambar = Str::random(6);
        $namaFile = 'image-'.$randomGambar.".".$extFile;
        $path = $request->foto->move('image', $namaFile);
        $pathGambar = 'image/'. $namaFile;
        $saveDetail = $detail_guru->create([
            'nama_lengkap' => $request->nama_lengkap,
            'nip_nisn' => $request->nip_nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'foto' => $pathGambar,
            'role_status' => $request->role_status,
            'siswa_kelas' => null,
            'siswa_status' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $saveDetail->save();
        
        $login_guru = new Login;
        $passwordGuru = Str::random(5);
        $userGuru = $request->nip_nisn;
        $token = Str::random(16);
        $level = "guru";
        
        $login_guru = Login::create([
            'email' => $userGuru.'@siakad.com',
            'username' => $userGuru,
            'password' => $passwordGuru,
            'level' => $level,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now()
            ]);
        $id_detailbaru = intval($saveDetail->id);
        $login_guru->detail()->associate($id_detailbaru);
        $login_guru->save();

        return redirect()->route('daftar-guru');
    }

    public function post_tambahMatapelajaran(Request $request)
    {
        $validateForm = $request->validate([
            'nama_matapelajaran' => 'required|max:255'
        ]);
        $matapelajaran = new Matapelajaran;
        $kodematapelajaran = 'MAPEL-';
        $kodematapelajaran .= Str::random(5);
        $save = $matapelajaran->create([
            'nama_matapelajaran' => $request->nama_matapelajaran,
            'kode_matapelajaran' => strtoupper($kodematapelajaran),
            'created_at' => now(),
            'updated_at'=> now()
        ]);
        $save->save();
        return redirect()->route('daftar-matapelajaran');
    }

    public function post_tambahKelas(Request $request)
    {
        if ($request->kelas == 'none') {
            if ($request->ext_kelas == 'none') {
                return redirect()->route('tambah-kelas');
            }
        }
        $kelas = new Kelas;
        $kodekelas = 'KLS-';
        $kodekelas .= strtoupper(Str::random(5));
        $urutankelas = $request->kelas;
        $extKelas = $request->ext_kelas;
        $gabungkelas = $urutankelas . ' ' . $extKelas;
        $saveKelas = $kelas->create([
            'kode_kelas' => $kodekelas,
            'kelas' => $gabungkelas,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $saveKelas->save();
        return redirect()->route('daftar-kelas');
    }
}
