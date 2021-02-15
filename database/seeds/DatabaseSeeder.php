<?php

use Illuminate\Database\Seeder;
use App\Login;
use App\Kelas;
use App\Matapelajaran;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr as Randoms;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        // for ($i = 0; $i<10; $i++) {
        //     // $matapelajaran = new Matapelajaran;
        //     Matapelajaran::create([
        //         'nama_matapelajaran' => strtoupper($faker->word),
        //         'kode_matapelajaran' => 'MAPEL-'.strtoupper(Str::random(5)),
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // }
        
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
                'nama_matapelajaran' => $strtoupper($item),
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
    }
}
