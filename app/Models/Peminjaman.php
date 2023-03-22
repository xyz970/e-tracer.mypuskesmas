<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjaman";
    protected $keyType = 'string'; 
    protected $guarded = [];

    public function rekam_medik()
    {
        return $this->belongsTo(RekamMedik::class,'id_rm');
    }
    public function status_peminjaman()
    {
        return $this->belongsTo(StatusPeminjaman::class,'status_id');
    }

    protected function waktu_peminjaman(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Carbon::now(),
        );
    }
}
