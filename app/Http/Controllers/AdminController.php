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
use App\Testtable;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr as Randoms;

class AdminController extends Controller
{
    public function daftarSemester()
    {
        $semester = Semester::all();
        $users = session('data_login');
        return view('admin.daftar-semester', compact('users', 'semester'));
    }

    public function tambahSemester()
    {
        $users = session('data_login');
        $kepsek = Detail::where('role_status', 'kepsek')->firstOrFail();
        return view('admin.tambah-semester', compact('users', 'kepsek'));
    }

    public function post_tambahSemester(Request $request)
    {
        $users = session('data_login');
        $saveSemester = Semester::create([
            'kode_semester' => 'SEMESTER-'.strtoupper(Str::random(5)),
            'status_semester' => 'Aktif',
            'tahun_ajaran' => $request->tahun_ajaran,
            'nip_kepsek' => intval($request->nip_kepsek),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $saveSemester->detail()->associate($request->idkepsek);
        $saveSemester->save();
        return redirect()->route('daftar-semester');
    }

    public function index()
    {
        $users = session('data_login');
        $detail_siswa = Detail::where('role_status', 'siswa')->get()->count();
        $detail_guru = Detail::where('role_status', 'guru')->get()->count();
        $detail_kelas = Kelas::all()->count();
        $detail_pengajar = Pengajar::all()->count();
        return view('admin.index', compact('users', 'detail_siswa', 'detail_guru', 'detail_kelas', 'detail_pengajar'));
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
        $cariUser = Login::where('username', $request->username)->get();
        if ($cariUser->isEmpty()) {
            return back()->with('status_fail', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('username', $request->username)->firstOrFail();
        switch ($data_login->level) {
            case 'admin':
                $cek_password = Hash::check($request->password, $data_login->password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    } else {
                        return redirect()->route('login')->with('password_fail', 'Password Salah!');
                    }
                }
                break;
            case 'guru':
                if ($request->password == $data_login->password) {
                    $users = session(['data_login' => $data_login]);
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->route('login')->with('password_fail', 'Username atau Password Salah!');
                }
                break;
            case 'siswa':
                if ($request->password == $data_login->password) {
                    $users = session(['data_login' => $data_login]);
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->route('login')->with('password_fail', 'Username atau Password Salah!');
                }
                break;
            case 'kepsek':
                if ($request->password == $data_login->password) {
                    $users = session(['data_login' => $data_login]);
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->route('login')->with('password_fail', 'Username atau Password Salah!');
                }
                break;
        }
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

    public function daftarPengajar()
    {
        $users = session('data_login');
        $pengajar = Pengajar::all();
        return view('admin.daftar-pengajar', compact('users', 'pengajar'));
    }

    // ---------------------------------------------------------------------------------------

    public function tambahSiswa()
    {
        $users = session('data_login');
        $kelas = Kelas::all();
        return view('admin.tambah-siswa', compact('users', 'kelas'));
    }

    public function editSiswa($idsiswa)
    {
        $users = session('data_login');
        $siswa = Detail::where('id', $idsiswa)->firstOrFail();
        $kelas = Kelas::all();
        return view('admin.edit-siswa', compact('users', 'siswa', 'kelas'));
    }

    public function updateSiswa(Request $request, $idsiswa)
    {
        if ($request->hasFile('foto')) {
            $extFile = $request->foto->getClientOriginalExtension();
            $randomGambar = Str::random(6);
            $namaFile = 'image-'.$randomGambar.".".$extFile;
            $path = $request->foto->move('image', $namaFile);
            $pathGambar = 'image/'. $namaFile;
        } else {
            $pathGambar = $request->foto_siswa;
        }
        $updateGuru = Detail::where('id', $idsiswa)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nip_nisn' => $request->nip_nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'foto' => $pathGambar,
            'role_status' => 'siswa',
            'kelas_id' => intval($request->siswa_kelas),
            'updated_at' => now()
        ]);
        return redirect()->route('daftar-siswa');
    }

    public function tambahGuru()
    {
        $users = session('data_login');
        return view('admin.tambah-guru', compact('users'));
    }

    public function editGuru($idguru)
    {
        $users = session('data_login');
        $guru = Detail::where('id', $idguru)->firstOrFail();
        return view('admin.edit-guru', compact('guru', 'users'));
    }

    public function updateGuru(Request $request, $idguru)
    {
        if ($request->hasFile('foto')) {
            $extFile = $request->foto->getClientOriginalExtension();
            $randomGambar = Str::random(6);
            $namaFile = 'image-'.$randomGambar.".".$extFile;
            $path = $request->foto->move('image', $namaFile);
            $pathGambar = 'image/'. $namaFile;
        } else {
            $pathGambar = $request->foto_guru;
        }
        $updateGuru = Detail::where('id', $idguru)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nip_nisn' => $request->nip_nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'foto' => $pathGambar,
            'role_status' => 'guru',
            'updated_at' => now()
        ]);
        return redirect()->route('daftar-guru');
    }

    public function tambahMatapelajaran()
    {
        $users = session('data_login');
        return view('admin.tambah-mata-pelajaran', compact('users'));
    }

    public function editMatapelajaran($idmatapelajaran)
    {
        $users = session('data_login');
        $matapelajaran = Matapelajaran::where('id', $idmatapelajaran)->firstOrFail();
        return view('admin.edit-matapelajaran', compact('users', 'matapelajaran'));
    }

    public function updateMatapelajaran(Request $request, $idmatapelajaran)
    {
        $updateMatapelajaran = Matapelajaran::where('id', $idmatapelajaran)->update([
            'nama_matapelajaran' => strtoupper($request->nama_matapelajaran),
            'updated_at' => now()
        ]);
        return redirect()->route('daftar-matapelajaran');
    }

    public function hapusMatapelajaran(Request $request, $idmatapelajaran)
    {
        $siswa = Matapelajaran::where('id', $request->idmatapelajaran)->firstOrFail();
        $siswa->forceDelete();
        return redirect()->route('daftar-matapelajaran');
    }

    public function tambahKelas()
    {
        $users = session('data_login');
        return view('admin.tambah-kelas', compact('users'));
    }

    public function tambahPengajar()
    {
        $users = session('data_login');
        $semester = Semester::all();
        $kelas = Kelas::all();
        $guru = Detail::whereIn('role_status', ['guru', 'kepsek'])->get();
        $matapelajaran = Matapelajaran::all();
        return view('admin.tambah-pengajar', compact(
            'users',
            'semester',
            'kelas',
            'guru',
            'matapelajaran'
        ));
    }

    public function detailPengajar($idpengajar)
    {
        $users = session('data_login');
        $pengajar = Pengajar::where('id', $idpengajar)->firstOrFail();
        $kelas_id = $pengajar->kelas->id;
        $siswa = Detail::where('role_status', 'siswa')->where('kelas_id', $kelas_id)->get();
        return view('admin.detail-pengajar', compact('users', 'pengajar', 'siswa'));
    }

    public function hapusPengajar(Request $request, $idpengajar)
    {
        $pengajar = Pengajar::where('id', $request->idpengajar)->firstOrFail();
        $pengajar->forceDelete();
        return redirect()->route('daftar-pengajar');
    }

    public function editPengajar($idpengajar)
    {
        $pengajar = Pengajar::where('id', $idpengajar)->firstOrFail();
        $users = session('data_login');
        $semester = Semester::all();
        $kelas = Kelas::all();
        $matapelajaran = Matapelajaran::all();
        $guru = Detail::where('role_status', 'guru')->get();
        return view('admin.edit-pengajar', compact(
            'users',
            'semester',
            'kelas',
            'guru',
            'pengajar',
            'matapelajaran'
        ));
    }

    public function updatePengajar(Request $request, $idpengajar)
    {
        $pengajarid = $idpengajar;

        $matapelajaran_id = $request->matapelajaran_id;
        $kelas_id = $request->kelas_id;
        $semester_id = $request->semester_id;
        $guru_id = $request->guru_id;

        $matapelajaran = Matapelajaran::where('id', $matapelajaran_id)->firstOrFail();
        $kelas = Kelas::where('id', $kelas_id)->firstOrFail();
        $semester = Semester::where('id', $semester_id)->firstOrFail();
        $guru = Detail::where('id', $guru_id)->firstOrFail();
        
        $updatePengajar = Pengajar::where('id', $pengajarid)->update([
            'kode_semester' => $semester->kode_semester,
            'kode_kelas' => $kelas->kode_kelas,
            'kode_matapelajaran' => $matapelajaran->kode_matapelajaran,
            'nip_guru' => $guru->nip_nisn,
            'semester_id' => $semester->id,
            'kelas_id' => $kelas->id,
            'matapelajaran_id' => $matapelajaran->id,
            'detail_id' => $guru->id,
            'updated_at' => now()
        ]);
        return redirect()->route('daftar-pengajar');
    }

    // ---------------------------------------------------------------------------------------
    
    public function post_tambahPengajar(Request $request)
    {
        $matapelajaran_id = $request->matapelajaran_id;
        $kelas_id = $request->kelas_id;
        $semester_id = $request->semester_id;
        $guru_id = $request->guru_id;

        $matapelajaran = Matapelajaran::where('id', $matapelajaran_id)->firstOrFail();
        $kelas = Kelas::where('id', $kelas_id)->firstOrFail();
        $semester = Semester::where('id', $semester_id)->firstOrFail();
        $guru = Detail::where('id', $guru_id)->firstOrFail();
        $pengajar = new Pengajar;
        $savePengajar = $pengajar->create([
            'kode_pengajar' => 'PENGAJAR-'.strtoupper(Str::random(5)),
            'kode_semester' => $semester->kode_semester,
            'kode_kelas' => $kelas->kode_kelas,
            'kode_matapelajaran' => $matapelajaran->kode_matapelajaran,
            'nip_guru' => $guru->nip_nisn,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $savePengajar->matapelajaran()->associate($matapelajaran->id);
        $savePengajar->kelas()->associate($kelas->id);
        $savePengajar->semester()->associate($semester->id);
        $savePengajar->detail()->associate($guru->id);
        $savePengajar->save();
        return redirect()->route('daftar-pengajar');
    }

    public function post_tambahSiswa(Request $request)
    {
        $detail_siswa = new Detail;

        $request->validate([
            'foto' => 'required',
        ]);
        
        if ($request->foto->getClientOriginalExtension() !== null) {
            $extFile = $request->foto->getClientOriginalExtension();
            $randomGambar = Str::random(6);
            $namaFile = 'image-'.$randomGambar.".".$extFile;
            $path = $request->foto->move('image', $namaFile);
            $pathGambar = 'image/'. $namaFile;
        } else {
            $pathGambar = 'image/image-hmDRkX.png';
        }

        // $extFile = $request->foto->getClientOriginalExtension();
        // $randomGambar = Str::random(6);
        // $namaFile = 'image-'.$randomGambar.".".$extFile;
        // $path = $request->foto->move('image', $namaFile);
        // $pathGambar = 'image/'. $namaFile;

        $saveDetail = $detail_siswa->create([
            'nama_lengkap' => $request->nama_lengkap,
            'nip_nisn' => $request->nip_nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'foto' => $pathGambar,
            'role_status' => $request->role_status,
            'siswa_status' => $request->siswa_status,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $saveDetail->kelas()->associate($request->siswa_kelas);
        $saveDetail->save();
        
        $login_siswa = new Login;
        $passwordSiswa = strtoupper(Str::random(5));
        $userSiswa = $request->nip_nisn;
        $token = Str::random(16);
        $level = "siswa";
        
        $login_siswa = Login::create([
            'email' => $userSiswa.'@localhost.com',
            'username' => $passwordSiswa,
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

        $request->validate([
            'foto' => 'required',
        ]);
        
        if ($request->foto->getClientOriginalExtension() !== null) {
            $extFile = $request->foto->getClientOriginalExtension();
            $randomGambar = Str::random(6);
            $namaFile = 'image-'.$randomGambar.".".$extFile;
            $path = $request->foto->move('image', $namaFile);
            $pathGambar = 'image/'. $namaFile;
        } else {
            $pathGambar = 'image/image-hmDRkX.png';
        }
        
        $saveDetail = $detail_guru->create([
            'nama_lengkap' => $request->nama_lengkap,
            'nip_nisn' => $request->nip_nisn,
            'jenis_kelamin' => 'Belum di input',
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'foto' => $pathGambar,
            'role_status' => $request->role_status,
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
            'username' => $passwordGuru,
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
        $nilaiSiswa = Nilai::where('detail_id', $siswa->id)->update([
            'detail_id' => null,
            'updated_at' => now(),
        ]);
        $siswa->forceDelete();
        return redirect()->route('daftar-siswa');
    }

    public function hapusGuru(Request $request, $idguru)
    {
        $guru = Detail::where('id', $request->idguru)->firstOrFail();
        $guru->kelas()->delete();
        $guru->login()->delete();
        $guru->pengajar()->delete();
        $guru->semester()->delete();
        $guru->absensi()->delete();
        $guru->forceDelete();
        return redirect()->route('daftar-guru');
    }

    // FAKER AUTO GENERATE DATA SISWA
    public function generate_siswa()
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i<50; $i++) {
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
        for ($i = 0; $i<25; $i++) {
            $detail_guru = new Detail;
            $array_jenkel = ['Laki-laki', 'Perempuan'];
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

    public function profileuser($iduser)
    {
        $users = session('data_login');
        $profile = Detail::where('id', $iduser)->firstOrFail();
        return view('admin.profile-user', compact('users', 'profile'));
    }

    public function daftarSiswaKelas($idkelas)
    {
        $users = session('data_login');
        $kelas_id = $idkelas;
        $siswa = Detail::where('role_status', 'siswa')->where('kelas_id', $kelas_id)->get();
        return view('admin.daftar-siswa-kelas', compact('users', 'siswa'));
    }

    public function test()
    {
        // INPUT ABSENSI
        // $absensi = new Absensi;
        // $pengajarAbsensi = Pengajar::latest()->first();
        // $nisn_siswa = Detail::where('role_status', 'siswa')->first();
        // $saveAbsensi = $absensi->create([
        //     'kode_pengajar' => $pengajarAbsensi->kode_pengajar,
        //     'kode_kelas' => $pengajarAbsensi->kelas->kode_kelas,
        //     'kode_semester' => $pengajarAbsensi->semester->kode_semester,
        //     'kode_matapelajaran' => $pengajarAbsensi->matapelajaran->kode_matapelajaran,
        //     'nisn_siswa' => $nisn_siswa->nip_nisn,
        //     'nisn_siswa' => $nisn_siswa->nip_nisn,
        //     'waktu_absen' => now(),
        //     'tanggal_absen' => now(),
        //     'status_absen' => 'Hadir',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // $saveAbsensi->pengajar()->associate($pengajarAbsensi->id);
        // $saveAbsensi->detail()->associate($nisn_siswa->id);
        // $saveAbsensi->save();
        // dd($saveAbsensi);
    }

    public function autoinputsiswa()
    {
        $array_count = collect(['ABDUL RAHMAT',
        'Ahmad Fauzan',
        'AL IKHSAN ABDUL RAHMAN',
        'ARFIANSYAH',
        'Aril',
        'Aswad',
        'Avdal',
        'Citra',
        'Dafrin',
        'Darwin',
        'Dasman',
        'Delfi',
        'Devin',
        'DIAN INDRIANI',
        'Edwin',
        'Fadli',
        'Faril',
        'Farlan',
        'Fikran',
        'Ikmal Saputra',
        'Indriyani',
        'Istiani',
        'Jamal',
        'JUMARDI YANSA',
        'Kasman',
        'Kasmin',
        'LaArga',
        'LaIrman',
        'LaRomi',
        'Leni Elvian',
        'Marlisa',
        'Mawar',
        'Muh. Akbar',
        'Muhamad Fajar',
        'Nesti',
        'Nova Marisa',
        'Nurhalima',
        'Nurmila',
        'Rahmat',
        'Ranti',
        'Rasti',
        'RENDI ARIFIN',
        'Restiyanti',
        'Revi Mariska',
        'Ridwan',
        'Rinda',
        'Rislan',
        'Sadiman',
        'SALIM SUKMA',
        'Sandra',
        'Selni Sutriani',
        'Selvi',
        'SIGITALFARAD',
        'Sista',
        'SITI SHALEHA',
        'Sry Alfianti',
        'Wa Misna',
        'Wulan Mutmainna',
        'Yasrin',
        'YUSLIATI',
        'Yuswita',
        'ZIKRAN']);

        $array_siswa = ['nama'=>['ABDUL RAHMAT','Ahmad Fauzan','AL IKHSAN ABDUL RAHMAN','ARFIANSYAH','Aril','Aswad','Avdal','Citra','Dafrin','Darwin','Dasman','Delfi','Devin','DIAN INDRIANI','Edwin','Fadli','Faril','Farlan','Fikran','Ikmal Saputra','Indriyani','Istiani','Jamal','JUMARDI YANSA','Kasman','Kasmin','LaArga','LaIrman','LaRomi','Leni Elvian','Marlisa','Mawar','Muh. Akbar','Muhamad Fajar','Nesti','Nova Marisa','Nurhalima','Nurmila','Rahmat','Ranti','Rasti','RENDI ARIFIN','Restiyanti','Revi Mariska','Ridwan','Rinda','Rislan','Sadiman','SALIM SUKMA','Sandra','Selni Sutriani','Selvi','SIGITALFARAD','Sista','SITI SHALEHA','Sry Alfianti','Wa Misna','Wulan Mutmainna','Yasrin','YUSLIATI','Yuswita','ZIKRAN'],'nisn'=>['0077768933','0078342758','0076956762','0083625737','0067293268','0056491016','0078299941','0066864939','0053722584','0068308637','0063017881','0053045883','0073331986','0082499829','0051401380','0067362507','0057710680','0059535843','0042653948','0042653947','0069285792','0056693575','0041389350','0089313618','0052013228','0048979722','0079831046','0048059550','0041329529','0069672143','0065793022','0061053156','0079704173','0073204003','0077642701','0066891200','0069026698','0059763603','0043284200','0047297816','0064746988','0079393297','0053472417','0069108488','0036473682','0049314287','0052994661','0054268385','0058077820','0054570781','0053339061','0068774183','0042755136','0066501674','0071739569','0071555196','9993549568','0063845691','0056565522','0076333615','0064937134','0073735029'],'jenis_kelamin'=>['L','L','L','L','L','L','L','P','L','L','L','L','L','P','L','L','L','L','L','L','P','P','L','L','L','P','L','L','L','P','P','P','L','L','P','P','P','P','L','P','P','L','P','P','L','P','L','L','L','P','P','P','L','P','P','P','P','P','L','P','P','L'],'alamat'=>['DESA WASAMPELA','Wasampela','POROS WASUEMBA','DESA WASAMPELA','Wasampela','Desa Wasampela','Wasampela','Desa Wasampela','Desa Wasampela','Wasampela','Desa Wasampela','Desa Wasampela','Wasampela','DESA WASAMPELA','Desa Wasampela','Wasampela','Wasampela','Desa Wasampela','Desa Wasampela','Desa Wasampela','Desa Wasampela','Desa Wasampela','Desa Wasampela','DESA WASAMPELA','Desa Wasampela','Desa Wasampela','Wasampela','Desa Wasampela','Desa Wasampela','Desa Wasampela','Wasampela','Desa Wasampela','Wasampela','Wasampela','Wasampela','Desa Wasampela','Wasampela','Desa Wasampela','Desa Wasampela','Jalan Poros Pasarwajo-Wabula','Wasampela','WASAMPELA','Desa Wasampela','Jalan Poros Pasarwajo-Wabula','Desa Wasampela','Desa Wasampela','JALAN POROS PASARWAJO-WABULA','Desa Wasampela','LABALA','Desa Wasampela','Desa Wasampela','Desa Wasampela','Jalan Poros Wabula-Burangasi','Desa Wasampela','DESA WASAMPELA','Wasampela','Desa Wasampela','Desa Wasampela','Desa Wasampela','DESA WASAMPELA','Wasampela','DESA WASAMPELA'],'telepon'=>['081344071142','085256553113','081355607757','082191190803','082353213277','082353221168','082350335508',' ','082344080481','082241401863','081324265124',' ','085298457047','081240012338','082296436724','082237192624','081342319175',' ',' ',' ','085299615500','081387847110',' ','081214811917','081220472482','082353250496','085258382859',' ','082233510227','082291252723','082296262350','082290310921','082290308903',' ','082353250539','082324989851','081389037066','085240981099',' ','081313040720','085333705026','082293049392','082190819430','085246444152',' ','082344080481','085242446887','081347003147','081344374513','082230504204','085244478131','082290444877','082259678631','085342824237','085340224227','082350395857','082296262350','082353084151',' ','082352403865',' ','082393265923']];
    
        $countSiswa = $array_count->count();
        $nama_siswa = 0;
        $nisn = 0;
        $jenis_kelamin = 0;
        $alamat = 0;
        $telepon = 0;
        for ($i = 0; $i<$countSiswa; $i++) {
            $gambarfaker = 'image/image-hmDRkX.png';
            $detail_siswa = new Detail;
            $saveDetail = $detail_siswa->create([
                'nama_lengkap' => $array_siswa['nama'][$nama_siswa++],
                'nip_nisn' => $array_siswa['nisn'][$nisn++],
                'jenis_kelamin' => $array_siswa['jenis_kelamin'][$jenis_kelamin++],
                'alamat' => $array_siswa['alamat'][$alamat++],
                'telepon' => $array_siswa['telepon'][$telepon++],
                'foto' => $gambarfaker,
                'role_status' => 'siswa',
                'siswa_status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            // $saveDetail->kelas()->associate($randomkelas);
            $saveDetail->save();
            $login_siswa = new Login;
            $passwordSiswa = $saveDetail->nip_nisn;
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

    public function testCase()
    {
        // $absensi = new Absensi;
        // $pengajarAbsensi = Pengajar::latest()->first();
        // $nisn_siswa = Detail::where('role_status', 'siswa')->first();
        // $saveAbsensi = $absensi->create([
        //     'kode_pengajar' => $pengajarAbsensi->kode_pengajar,
        //     'kode_kelas' => $pengajarAbsensi->kelas->kode_kelas,
        //     'kode_semester' => $pengajarAbsensi->semester->kode_semester,
        //     'kode_matapelajaran' => $pengajarAbsensi->matapelajaran->kode_matapelajaran,
        //     'nisn_siswa' => $nisn_siswa->nip_nisn,
        //     'nisn_siswa' => $nisn_siswa->nip_nisn,
        //     'waktu_absen' => now(),
        //     'tanggal_absen' => now(),
        //     'status_absen' => 'Hadir',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // $saveAbsensi->pengajar()->associate($pengajarAbsensi->id);
        // $saveAbsensi->detail()->associate($nisn_siswa->id);
        // $saveAbsensi->save();
        // dd($saveAbsensi);
    }
}
