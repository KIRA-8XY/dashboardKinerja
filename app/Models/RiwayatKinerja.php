<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatKinerja extends Model
{
    protected $fillable = [
        'pegawai_id',
        'nama_indikator',
        'target',
        'realisasi',
        'bulan',
        'tahun',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
