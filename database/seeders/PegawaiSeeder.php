<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan pegawai khusus dengan id 99
        DB::table('pegawais')->insert([
            'id' => 99,
            'nama' => 'Developer Pegawai',
            'jabatan' => 'Developer',
            'target' => 0,
            'realisasi' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $data = [
            'ANGGA BAGUS SASMITA',
            'DIMAS WIRA YUDHA',
            'FAUZIA AMALIA RACHMAWATIE',
            'HASNI RAHMAWATI',
            'MEGANSYA PATRIA GANDARA',
            'R FATKHURRAHMAN ERLANGGA',
            'RIDHA KARUNIA',
            'SYAHRIAL FITRIAN AMIR',
        ];

        foreach ($data as $nama) {
            Pegawai::create([
                'nama' => $nama,
                'target' => rand(50, 100),
                'realisasi' => rand(30, 100)
            ]);
        }
    }
}
