<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenyebabSeranganTanaman extends Model
{
    protected $table = 'penyebab_serangan_tanaman';

    protected $fillable = [
        'id_tanaman',
        'id_penyebab_serangan',
    ];

    /**
     * Relasi ke tabel Tanaman
     */
    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class, 'id_tanaman');
    }

    /**
     * Relasi ke tabel PenyebabSerangan
     */
    public function penyebabSerangan()
    {
        return $this->belongsTo(PenyebabSerangan::class, 'id_penyebab_serangan');
    }
}
