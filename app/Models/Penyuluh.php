<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Penyuluh extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'penyuluh';

    protected $primaryKey = 'id_penyuluh';

    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Get the role attribute for multi-auth compatibility.
     */
    public function getRoleAttribute(): Role
    {
        return Role::PENYULUH;
    }

    /**
     * Get the penanganan by this penyuluh.
     */
    public function penanganan(): HasMany
    {
        return $this->hasMany(Penanganan::class, 'id_penyuluh', 'id_penyuluh');
    }

    /**
     * Get the desa for this penyuluh.
     */
    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}
