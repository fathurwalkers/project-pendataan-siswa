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

class AdminController extends Controller
{
    public function index()
    {
        $users = session('data_login');
        $detail_siswa = Detail::where('role_status', 'siswa')->get()->count();
        return view('admin.index', [
            'users' => $users,
            'detail_siswa' => $detail_siswa
        ]);
    }

    public function login()
    {
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
        $daftarsiswa = Detail::where('role_status', 'siswa')->latest()->get();
        return view('admin.daftar-siswa', compact('users', 'daftarsiswa'));
    }

    public function daftarGuru()
    {
        $users = session('data_login');
        $daftarguru = Detail::where('role_status', 'guru')->latest()->get();
        return view('admin.daftar-guru', compact('users', 'daftarguru'));
    }

    public function daftarMatapelajaran()
    {
        $users = session('data_login');
        $matapelajaran = Matapelajaran::latest()->get();
        return view('admin.daftar-mata-pelajaran', compact('users', 'matapelajaran'));
    }

    public function daftarKelas()
    {
        $users = session('data_login');
        $kelas = Kelas::latest()->get();
        return view('admin.daftar-kelas', compact('users', 'kelas'));
    }

    public function daftarUserSiswa()
    {
        $users = session('data_login');
        $user_siswa = Login::where('level', 'siswa')->latest()->get();
        return view('admin.daftar-user-siswa', compact('users', 'user_siswa'));
    }

    public function daftarUserGuru()
    {
        $users = session('data_login');
        $user_guru = Login::where('level', 'guru')->latest()->get();
        return view('admin.daftar-user-guru', compact('users', 'user_guru'));
    }

    // ---------------------------------------------------------------------------------------

    public function tambahSiswa()
    {
        $users = session('data_login');
        return view('admin.tambah-siswa', compact('users'));
    }

    public function tambahGuru()
    {
        $users = session('data_login');
        return view('admin.tambah-guru', compact('users'));
    }

    public function tambahMatapelajaran()
    {
        $users = session('data_login');
        return view('admin.tambah-mata-pelajaran', compact('users'));
    }

    public function tambahKelas()
    {
        $users = session('data_login');
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
        $passwordSiswa = strtoupper(Str::random(5));
        $userSiswa = $request->nip_nisn;
        $token = Str::random(16);
        $level = "siswa";
        
        $login_siswa = Login::create([
            'email' => $userSiswa.'@localhost.com',
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
        $passwordGuru = strtoupper(Str::random(5));
        $userGuru = $request->nip_nisn;
        $token = Str::random(16);
        $level = "guru";
        
        $login_guru = Login::create([
            'email' => $userGuru.'@aplikasi.com',
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
        return redirect()->route('tambah-kelas');
    }

    public function biodata_siswa(Request $request, $idsiswa)
    {
        $users = session('data_login');
        $siswa = Detail::where('id', $idsiswa)->firstOrFail();
        if ($siswa->role_status == 'siswa') {
            return view('admin.biodata-siswa', compact('siswa', 'users'));
        }
        return back();
    }

    public function biodata_guru(Request $request, $idguru)
    {
        $users = session('data_login');
        $guru = Detail::where('id', $idguru)->firstOrFail();
        if ($guru->role_status == 'guru') {
            return view('admin.biodata-guru', compact('guru', 'users'));
        }
        return back();
    }

    public function hapusSiswa(Request $request, $idsiswa)
    {
        $siswa = Detail::where('id', $request->idsiswa)->firstOrFail();
        $siswa->forceDelete();
        return redirect()->route('daftar-siswa');
    }

    public function hapusGuru(Request $request, $idguru)
    {
        $guru = Detail::where('id', $request->idguru)->firstOrFail();
        $guru->forceDelete();
        return redirect()->route('daftar-guru');
    }

    // FAKER AUTO GENERATE DATA SISWA
    public function generate_siswa()
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i<10; $i++) {
            $kelas = Kelas::all();
            $randomkelas = $kelas->random();
            $detail_siswa = new Detail;
            $array_jenkel = ['Laki-laki', 'Perempuan'];
            $jenis_kelamin = Randoms::random($array_jenkel);
            $role_status = 'siswa';
            $siswa_status = 'Aktif';
            $gambarfaker = 'image/image-hmDRkX.png';

            $saveDetail = $detail_siswa->create([
                'nama_lengkap' => $faker->name,
                'nip_nisn' => $faker->unique()->numberBetween(700000000, 900000000),
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $faker->address,
                'telepon' => '08'.$faker->unique()->numberBetween(70000000000, 90000000000),
                'foto' => $gambarfaker,
                'role_status' => $role_status,
                'siswa_status' => $siswa_status,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $saveDetail->kelas()->associate($randomkelas);
            $saveDetail->save();
            $login_siswa = new Login;
            $passwordSiswa = strtoupper(Str::random(5));
            $userSiswa = $saveDetail->nip_nisn;
            $token = Str::random(16);
            $level = "siswa";
            
            $login_siswa = Login::create([
                'email' => $userSiswa.'@localhost.com',
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
        }
        return redirect()->route('daftar-siswa');
    }

    // FAKER AUTO GENERATE DATA GURU
    public function generate_guru()
    {
        $faker = Faker::create('id_ID');
        
        for ($i = 0; $i<10; $i++) {
            $detail_guru = new Detail;
            $array_jenkel = ['Laki-laki', 'Perempuan'];
            $array_kelas = ['1', '2', '3'];
            $siswa_kelas = Randoms::random($array_kelas);
            $jenis_kelamin = Randoms::random($array_jenkel);
            $role_status = 'guru';
            $siswa_status = 'Aktif';
            $gambarfaker = 'image/image-hmDRkX.png';
            $saveDetail = $detail_guru->create([
                'nama_lengkap' => $faker->name,
                'nip_nisn' => $faker->unique()->numberBetween(700000000, 900000000),
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $faker->address,
                'telepon' => '08'.$faker->unique()->numberBetween(70000000000, 90000000000),
                'foto' => $gambarfaker,
                'role_status' => $role_status,
                'siswa_status' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $saveDetail->save();
            $login_guru = new Login;
            $passwordGuru = strtoupper(Str::random(5));
            $userGuru = $saveDetail->nip_nisn;
            $token = Str::random(16);
            $level = "guru";
            
            $login_guru = Login::create([
                'email' => $userGuru.'@localhost.com',
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
        }
        return redirect()->route('daftar-guru');
    }
}
