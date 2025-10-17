<?php

namespace App\Livewire\Dashboard;

use App\Models\LaporanSerangan;
use Livewire\Component;


class PetaniDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.petani-dashboard', [
            'jumlah_laporan' => LaporanSerangan::query()->where('id_user', getActiveUserId())->count()
        ]);
    }
}
