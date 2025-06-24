<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use App\Models\RiwayatKinerja;

class RiwayatKinerjaSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Pegawai::all() as $pegawai) {
            // Buat 5 entri riwayat acak per pegawai
            for ($i = 1; $i <= 5; $i++) {
                $target = rand(1000, 5000);
                $realisasi = rand((int)($target * 0.4), (int)($target * 1.1));

                RiwayatKinerja::create([
                    'pegawai_id'     => $pegawai->id,
                    'nama_indikator' => "Kinerja Bulanan #{$i}",
                    'target'         => $target,
                    'realisasi'      => $realisasi,
                    'bulan'          => rand(1, 12),
                    'tahun'          => now()->year,
                ]);
            }
        }
    }
}
