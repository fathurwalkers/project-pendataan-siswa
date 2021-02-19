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
        $array_mapel = [
            'Matematika',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Fisika',
            'Kimia',
            'Sejarah',
            'Pendidikan Agama Islam',
            'Pendidikan Kewarganegaraan',
            'Kewirausahaan',
            'Penjaskes',
            'Biologi'
        ];
        foreach ($array_mapel as $item) {
            Matapelajaran::create([
                'nama_matapelajaran' => strtoupper($item),
                'kode_matapelajaran' => 'MAPEL-'.strtoupper(Str::random(5)),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $token = Str::random(16);
        $level = "admin";
        Login::create([
            'email' => 'fathurwalkers44@gmail.com',
            'username' => 'fathurwalkers',
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
            'siswa_status' => null,
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
            'siswa_status' => null,
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

        $nipkepsek = Detail::where('role_status', 'kepsek')->firstOrFail();
        $tahun_ajaran = [
            '2010/2011',
            '2011/2012',
            '2013/2014',
            '2014/2016',
            '2017/2018',
            '2019/2020',
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
