<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KepalaDinas extends Authenticatable
{
    protected $table = 'kepala_dinas';

    protected $primaryKey = 'id_kepala_dinas';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kepalaDinas) {
            if (self::count() >= 1) {
                throw new \Exception('Hanya boleh ada satu Kepala Dinas dalam sistem.');
            }
        });
    }

    public function getRoleAttribute()
    {
        return Role::KEPALADINAS;
    }

    public function desa()
    {
        return $this->hasOne(Desa::class, 'id_desa');
    }

    public function laporanSerangan()
    {
        return $this->hasMany(LaporanSerangan::class, 'id_kepala_dinas', 'id_kepala_dinas');
    }
}
