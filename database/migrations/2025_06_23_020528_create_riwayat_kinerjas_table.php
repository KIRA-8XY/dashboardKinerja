<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('riwayat_kinerjas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pegawai_id')->constrained()->onDelete('cascade');
        $table->string('nama_indikator');
        $table->integer('target');
        $table->integer('realisasi');
        $table->unsignedTinyInteger('bulan'); // 1 = Januari, 2 = Februari, dst
        $table->year('tahun');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_kinerjas');
    }
};
