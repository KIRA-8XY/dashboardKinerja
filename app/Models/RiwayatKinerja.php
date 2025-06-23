<?php

// app/Models/RiwayatKinerja.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatKinerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id', 'nama_indikator', 'target', 'realisasi', 'bulan', 'tahun'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}

