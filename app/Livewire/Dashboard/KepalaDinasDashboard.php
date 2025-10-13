<?php

namespace App\Livewire\Dashboard;

use App\Enums\Role;
use App\Models\Petugas;
use App\Models\User;
use Livewire\Component;

class KepalaDinasDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.kepala-dinas-dashboard', [
            'jumlah_petani' => User::query()->where('role', Role::PETANI)->count(),
            'jumlah_petugas' => User::query()->where('role', Role::PENYULUH)->count(),
        ]);
    }
}
