<?php

use Illuminate\Database\Seeder;
use App\Login;
use App\Kelas;
use App\Matapelajaran;
use App\Detail;
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

        $kodekelas = 'KLS-';
        $kodekelas .= strtoupper(Str::random(5));
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'VII A',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'VII B',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'VII C',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'VII D',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'VII E',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'VIII A',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'VIII B',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'VIII C',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'VIII D',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'VIII E',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'IX A',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'IX B',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'IX C',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'IX D',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Kelas::create([
            'kode_kelas' => $kodekelas,
            'kelas' => 'IX E',
            'created_at' => now(),
            'updated_at' => now()
        ]);

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
        $passwordSiswa = strtoupper('siswa');
        $userSiswa = $saveDetail->nama_lengkap;
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
}
