<?php

use Illuminate\Database\Seeder;
use App\Login;
use App\Kelas;
use App\Matapelajaran;
use App\Detail;
use App\Semester;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr as Randoms;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // SEED DATA MATAPELAJARAN
        $array_mapel = [
            'Matematika',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'SBK',
            'IPS',
            'IPA',
            'Prakarya',
            'Pendidikan Agama Islam',
            'Pendidikan Kewarganegaraan',
            'BK',
            'Penjaskes'
        ];
        foreach ($array_mapel as $item) {
            Matapelajaran::create([
                'nama_matapelajaran' => strtoupper($item),
                'kode_matapelajaran' => 'MAPEL-'.strtoupper(Str::random(5)),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $hashPassword = Hash::make('admin', [
            'rounds' => 12,
        ]);
        $token = Str::random(16);
        $level = "admin";
        Login::create([
            'email' => 'admin@smp39.com',
            'username' => 'admin',
            'password' => $hashPassword,
            'level' => $level,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $arraykelas = [
            'VII A',
            'VII B',
            'VII C',
            'VII D',
            'VII E',
            'VIII A',
            'VIII B',
            'VIII C',
            'VIII D',
            'VIII E',
            'IX A',
            'IX B',
            'IX C',
            'IX D',
            'IX E'
        ];
        foreach ($arraykelas as $itemkelas) {
            Kelas::create([
                'kode_kelas' => 'KLS-'.strtoupper(Str::random(5)),
                'kelas' => strtoupper($itemkelas),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
        // SEED DATA SISWA
        $kelas = Kelas::all();
        $randomkelas = $kelas->random();
        $saveDetail = Detail::create([
            'nama_lengkap' => 'siswa_test',
            'nip_nisn' => '999999',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jln. Test, Kec. Test, Kel. Test No. 99',
            'telepon' => '121231312',
            'foto' => 'image/image-AdcZ0R.png',
            'role_status' => 'siswa',
            'siswa_status' => 'Aktif',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $saveDetail->kelas()->associate($randomkelas);
        $saveDetail->save();

        $login_siswa = new Login;
        $passwordSiswa = 'siswa';
        $userSiswa = 'siswa';
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


        // SEED DATA GURU
        $detail_guru = new Detail;
        $role_status = 'guru';
        $gambarfaker = 'image/image-hmDRkX.png';
        $saveGuru = $detail_guru->create([
            'nama_lengkap' => 'guru_test',
            'nip_nisn' => '10101010',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jln. Test, Kec. Test, Kel. Test No. 99',
            'telepon' => '0892929291',
            'foto' => $gambarfaker,
            'role_status' => $role_status,
            'siswa_status' => 'Aktif',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $saveGuru->save();
        $login_guru = new Login;
        $passwordGuru = 'guru';
        $userGuru = 'guru';
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
        $id_detailbaru = intval($saveGuru->id);
        $login_guru->detail()->associate($id_detailbaru);
        $login_guru->save();
        
        //

        // --------------------------------------------------------------------

        
        // SEED DATA KEPALA SEKOLAH
        $detail_kepsek = new Detail;
        $role_status = 'kepsek';
        $gambarfaker = 'image/image-hmDRkX.png';
        $savekepsek = $detail_kepsek->create([
            'nama_lengkap' => 'kepsek_test',
            'nip_nisn' => '10101010',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jln. Test, Kec. Test, Kel. Test No. 99',
            'telepon' => '0892929291',
            'foto' => $gambarfaker,
            'role_status' => $role_status,
            'siswa_status' => 'Aktif',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $savekepsek->save();
        $login_kepsek = new Login;
        $passwordkepsek = 'kepsek';
        $userkepsek = 'kepsek';
        $token = Str::random(16);
        $level = "kepsek";
        
        $login_kepsek = Login::create([
            'email' => $userkepsek.'@localhost.com',
            'username' => $userkepsek,
            'password' => $passwordkepsek,
            'level' => $level,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now()
            ]);
        $id_detailbaru = intval($savekepsek->id);
        $login_kepsek->detail()->associate($id_detailbaru);
        $login_kepsek->save();

        //

        $detail_kepsek = new Detail;
        $role_status = 'kepsek';
        $gambarfaker = 'image/image-hmDRkX.png';
        $savekepsek = $detail_kepsek->create([
            'nama_lengkap' => 'La Dadi, S.Pd',
            'nip_nisn' => '19661231199103 1 094',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'alamat belum di masukkan',
            'telepon' => 'nomor telepon belum ada.',
            'foto' => $gambarfaker,
            'role_status' => $role_status,
            'siswa_status' => 'Kepala Sekolah / GT',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $savekepsek->save();
        $login_kepsek = new Login;
        $passwordkepsek = 'la_dadi';
        $userkepsek = 'la_dadi';
        $token = Str::random(16);
        $level = "kepsek";
        
        $login_kepsek = Login::create([
            'email' => $userkepsek.'@smp39.com',
            'username' => $userkepsek,
            'password' => $passwordkepsek,
            'level' => $level,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now()
            ]);
        $id_detailbaru = intval($savekepsek->id);
        $login_kepsek->detail()->associate($id_detailbaru);
        $login_kepsek->save();

        //

        $detail_kepsek = new Detail;
        $role_status = 'kepsek';
        $gambarfaker = 'image/image-hmDRkX.png';
        $savekepsek = $detail_kepsek->create([
            'nama_lengkap' => 'Rukiani Habo, S.Pd ',
            'nip_nisn' => '19740116201101 2 002',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'alamat belum di masukkan.',
            'telepon' => 'nomor telepon belum ada.',
            'foto' => $gambarfaker,
            'role_status' => $role_status,
            'siswa_status' => 'Wakil Kepala Sekolah / GT',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $savekepsek->save();
        $login_kepsek = new Login;
        $passwordkepsek = 'rukiani_habo';
        $userkepsek = 'rukiano_habo';
        $token = Str::random(16);
        $level = "kepsek";
        
        $login_kepsek = Login::create([
            'email' => $userkepsek.'@smp39.com',
            'username' => $userkepsek,
            'password' => $passwordkepsek,
            'level' => $level,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now()
            ]);
        $id_detailbaru = intval($savekepsek->id);
        $login_kepsek->detail()->associate($id_detailbaru);
        $login_kepsek->save();

        // ----------------------------------------------------------------------------

        // SEED DATA SEMESTER
        $nipkepsek = Detail::where('role_status', 'kepsek')->where('nip_nisn', '19661231199103 1 094')->firstOrFail();
        $tahun_ajaran = [
            '2020/2021',
            '2021/2022'
        ];
        foreach ($tahun_ajaran as $tems) {
            $semester = new Semester;
            $saveSemester = $semester->create([
                'kode_semester' => 'SEMESTER-'.strtoupper(Str::random('5')),
                'status_semester' => 'Aktif',
                'tahun_ajaran' => $tems,
                'nip_kepsek' => $nipkepsek->nip_nisn,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $saveSemester->detail()->associate($nipkepsek->id);
            $saveSemester->save();
        }
    }
}
