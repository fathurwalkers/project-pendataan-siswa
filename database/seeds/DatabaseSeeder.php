<?php

use Illuminate\Database\Seeder;
use App\Login;
use App\Kelas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
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
            'kelas_kelas' => $kodekelas,
            'kelas' => 'VII A',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'VII B',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'VII C',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'VII D',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'VII E',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'VIII A',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'VIII B',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'VIII C',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'VIII D',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'VIII E',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'IX A',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'IX B',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'IX C',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'IX D',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kelas::create([
            'kelas_kelas' => $kodekelas,
            'kelas' => 'IX E',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
