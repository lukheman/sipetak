<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penanganan extends Model
{

    protected $table = 'rekomendasi_penanganan';
    protected $guarded = [];

    public function penyuluh()
    {
        return $this->belongsTo(Penyuluh::class, 'id_penyuluh', 'id_penyuluh');
    }

    public function laporanSerangan()
    {
        return $this->belongsTo(LaporanSerangan::class, 'id_laporan_serangan');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}
