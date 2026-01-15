<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';

    protected $primaryKey = 'id_admin';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($admin) {
            if (self::count() >= 1) {
                throw new \Exception('Hanya boleh ada satu Admin dalam sistem.');
            }
        });
    }

    public function getRoleAttribute()
    {
        return Role::ADMIN;
    }

    public function penanganan()
    {
        return $this->hasMany(Penanganan::class, 'id_admin', 'id_admin');
    }
}

