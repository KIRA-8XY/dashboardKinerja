<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    public function indikators()
    {
        return $this->hasMany(Indikator::class);
    }

    public function riwayatKinerjas()
    {
        return $this->hasMany(RiwayatKinerja::class);
    }


}
