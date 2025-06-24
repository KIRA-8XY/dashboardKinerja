<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = ['nama', 'jabatan', 'target', 'realisasi'];

    public function indikators()
    {
        return $this->hasMany(Indikator::class);
    }
}
