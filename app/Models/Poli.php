<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;
    protected $table = "poli";
    public function rekam_medik()
    {
        return $this->hasOne(RekamMedik::class);
    }
    public function dokter()
    {
        return $this->hasOne(Dokter::class);
    }
}
