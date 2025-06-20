<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
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
