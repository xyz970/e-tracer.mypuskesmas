<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePerawatan extends Model
{
    use HasFactory;
    protected $table = "tipe_perawatan";

    public function rekam_medik()
    {
        return $this->hasOne(RekamMedik::class);
    }
}
