<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSerangan extends Model
{
    /** @use HasFactory<\Database\Factories\LaporanSeranganFactory> */
    use HasFactory;

    protected $table = 'laporan_serangan';
    protected $guarded = [];

    public function casts(): array {
        return [
            'status' => \App\Enums\StatusLaporan::class,
        ];
    }

    public function tanaman() {
        return $this->belongsTo(Tanaman::class, 'id_tanaman');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function penanganan()
    {
        return $this->hasOne(Penanganan::class, 'id_laporan_serangan');
    }

    public function penyebabSerangan() {
        return $this->belongsToMany(PenyebabSerangan::class, 'detail_laporan_serangan', 'id_laporan_serangan', 'id_penyebab_serangan');
    }
}
