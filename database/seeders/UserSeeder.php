<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Akun untuk semua pegawai
        $pegawais = Pegawai::all();
        foreach ($pegawais as $pegawai) {
            User::create([
                'name' => $pegawai->nama,
                'email' => strtolower(str_replace(' ', '', $pegawai->nama)) . '@example.com',
                'password' => Hash::make('password'),
                'role' => 'pegawai',
                'pegawai_id' => $pegawai->id,
            ]);
        }
    }
}
