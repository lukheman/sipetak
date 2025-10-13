<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyebabSerangan extends Model
{
    /** @use HasFactory<\Database\Factories\PenyebabSeranganFactory> */
    use HasFactory;
    protected $table = 'penyebab_serangan';
    protected $guarded = [];

    public function laporanSerangan() {
        return $this->belongsToMany(LaporanSerangan::class, 'detail_laporan_serangan', 'id_penyebab_serangan', 'id_laporan_serangan');
    }
}
