<?php

namespace App\Livewire\Dashboard;

use App\Enums\Role;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.admin-dashboard', [
            'jumlah_petani' => User::query()->where('role', Role::PETANI)->count(),
            'jumlah_penyuluh' => User::query()->where('role', Role::PENYULUH)->count(),
        ]);
    }
}
