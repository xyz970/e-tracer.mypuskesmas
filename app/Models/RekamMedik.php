<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedik extends Model
{
    use HasFactory;
    protected $table = "rekam_medik";
    protected $guarded = [];

    public function tipe_perawatan()
    {
        return $this->belongsTo(TipePerawatan::class);
    }
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class);
    }
}
