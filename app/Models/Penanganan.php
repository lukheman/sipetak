<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penanganan extends Model
{

    protected $table = 'penanganan';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
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
