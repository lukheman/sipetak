<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyebabSerangan extends Model
{
    /** @use HasFactory<\Database\Factories\PenyebabSeranganFactory> */
    use HasFactory;

    public const TIPE_HAMA = 'hama';
    public const TIPE_PENYAKIT = 'penyakit';

    public const TIPE_OPTIONS = [
        self::TIPE_HAMA => 'Hama',
        self::TIPE_PENYAKIT => 'Penyakit',
    ];

    protected $table = 'penyebab_serangan';
    protected $guarded = [];

    /**
     * Check if this penyebab serangan is Hama type
     */
    public function isHama(): bool
    {
        return $this->tipe === self::TIPE_HAMA;
    }

    /**
     * Check if this penyebab serangan is Penyakit type
     */
    public function isPenyakit(): bool
    {
        return $this->tipe === self::TIPE_PENYAKIT;
    }

    /**
     * Get tipe label for display
     */
    public function getTipeLabelAttribute(): string
    {
        return self::TIPE_OPTIONS[$this->tipe] ?? ucfirst($this->tipe);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    public function laporanSerangan()
    {
        return $this->belongsToMany(
            LaporanSerangan::class,
            'detail_laporan_serangan',
            'id_penyebab_serangan',
            'id_laporan_serangan'
        )->withTimestamps();
    }
}
