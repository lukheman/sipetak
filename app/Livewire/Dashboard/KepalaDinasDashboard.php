<?php

namespace App\Livewire\Dashboard;

use App\Models\Petani;
use App\Models\Penyuluh;
use Livewire\Component;

class KepalaDinasDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.kepala-dinas-dashboard', [
            'jumlah_petani' => Petani::query()->count(),
            'jumlah_petugas' => Penyuluh::query()->count(),
        ]);
    }
}
