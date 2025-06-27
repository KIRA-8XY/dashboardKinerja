<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class TestReduceIndikatorsSeeder extends Seeder
{
    public function run()
    {
        $pegawais = Pegawai::with('indikators')->get();

        foreach ($pegawais as $pegawai) {
            if ($pegawai->indikators->count() > 10) {
                // Get IDs of indicators to remove (all after first 10)
                $indikatorsToRemove = $pegawai->indikators->slice(10)->pluck('id');
                
                // Detach the excess indicators
                $pegawai->indikators()->whereIn('id', $indikatorsToRemove)->delete();
            }
        }
    }
}
