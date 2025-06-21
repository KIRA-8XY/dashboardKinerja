<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use App\Models\Indikator;

class IndikatorSeeder extends Seeder
{
    public function run()
    {
        $pegawai = Pegawai::first();

        $indikatorList = [
            ['TK AKTIF PU', 8453, 6730],
            ['TK AKTIF BPU', 25764, 6226],
            ['PENERIMAAN IURAN PU', 4295502360, 2505185335],
            ['PENERIMAAN IURAN BPU', 3251037389, 443391000],
            ['PK/BU IBB', 75, 49.25],
            ['PK/BU ITW', 85, 35.07],
            ['TINGKAT RETENSI PESERTA', 100, 63],
            ['PENINGKATAN KUALITAS DATA', 90, 0],
            ['PENINGKATAN RELATIONSHIP ENGAGEMENT', 20, 0],
            ['PRODUKTIVITAS KEAGENAN', 20, 54.82],
        ];

        foreach ($indikatorList as $ind) {
            Indikator::create([
                'pegawai_id' => $pegawai->id,
                'nama_indikator' => $ind[0],
                'target' => $ind[1],
                'realisasi' => $ind[2]
            ]);
        }
    }
}
