<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $fillable = [
        'pegawai_id',
        'nama_indikator',
        'target',
        'realisasi',
    ];

    // Relasi ke model Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    // Persentase realisasi otomatis
    public function getPersenRealisasiAttribute()
    {
        return $this->target > 0 ? ($this->realisasi / $this->target) * 100 : 0;
    }

    // KPI score otomatis
    public function getKpiScoreAttribute()
    {
        $percent = $this->persen_realisasi;

        if ($percent >= 100) {
            return ['nilai' => 10, 'warna' => 'bg-success'];
        } elseif ($percent >= 70) {
            return ['nilai' => 6, 'warna' => 'bg-warning'];
        } else {
            return ['nilai' => 2, 'warna' => 'bg-danger'];
        }
    }
}
