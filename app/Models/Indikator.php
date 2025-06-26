<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'target',
        'realisasi',
        'max_score',
        'score',
        'pegawai_id'
    ];

    // Relasi ke model Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function calculateScore()
    {
        if ($this->target == 0) {
            $this->score = 0;
            return;
        }
        
        $percentage = min(100, ($this->realisasi / $this->target) * 100);
        $this->score = round(($percentage / 100) * $this->max_score, 2);
        $this->save();
    }

    public function getColorClass()
    {
        if ($this->target == 0) return 'bg-gray-100 text-gray-800';
        
        $percentage = ($this->realisasi / $this->target) * 100;
        
        if ($percentage >= 100) return 'bg-green-100 text-green-800';
        if ($percentage >= 80) return 'bg-yellow-100 text-yellow-800';
        return 'bg-red-100 text-red-800';
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
