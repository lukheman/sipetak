<?php

namespace App\Livewire\Dashboard;

use App\Models\Petani;
use Livewire\Component;

class PetugasDashboard extends Component
{
    public $kecamatan;

    public function getJumlahPetani(): int
    {
        return Petani::query()->count();
    }

    public function render()
    {
        return view('livewire.dashboard.petugas-dashboard', [
            'jumlah_petani' => $this->getJumlahPetani(),
        ]);
    }
}
