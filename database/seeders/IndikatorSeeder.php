<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use App\Models\Indikator;

class IndikatorSeeder extends Seeder
{
    public function run()
    {
        $indikatorNames = [
            'TK AKTIF PU',
            'TK AKTIF BPU',
            'PENERIMAAN IURAN PU',
            'PENERIMAAN IURAN BPU',
            'PK/BU IBB',
            'PK/BU ITW',
            'TINGKAT RETENSI PESERTA',
            'PENINGKATAN KUALITAS DATA',
            'PENINGKATAN RELATIONSHIP ENGAGEMENT',
            'PRODUKTIVITAS KEAGENAN',
        ];

        foreach (Pegawai::all() as $pegawai) {
            foreach ($indikatorNames as $idx => $nama) {
                // Buat target dan realisasi berbeda untuk tiap pegawai
                $baseTarget = 1000 * ($idx + 1) + ($pegawai->id * 100);
                $target = $baseTarget + rand(0, 500);
                $realisasi = rand(intval($target * 0.3), intval($target * 1.2));

                Indikator::create([
                    'pegawai_id' => $pegawai->id,
                    'nama_indikator' => $nama,
                    'target' => $target,
                    'realisasi' => $realisasi,
                ]);
            }
        }
    }
}
