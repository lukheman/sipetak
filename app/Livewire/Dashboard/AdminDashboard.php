<?php

namespace App\Livewire\Dashboard;

use App\Models\Petani;
use App\Models\Penyuluh;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.admin-dashboard', [
            'jumlah_petani' => Petani::query()->count(),
            'jumlah_penyuluh' => Penyuluh::query()->count(),
        ]);
    }
}
