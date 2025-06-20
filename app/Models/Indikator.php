<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    //
    public function up()
    {
        Schema::create('indikators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->string('nama_indikator');
            $table->double('target');
            $table->double('realisasi');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
        });
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }


}
