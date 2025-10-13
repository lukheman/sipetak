<?php

namespace App\Livewire\Dashboard;

use App\Enums\Role;
use App\Models\HasilPanen;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PetugasDashboard extends Component
{

    public $kecamatan;

    public function getJumlahPetani(): int {

        $user = User::query()->where('role', Role::PETANI)->count();
        return $user;

    }

    public function render()
    {
        return view('livewire.dashboard.petugas-dashboard', [
            'jumlah_petani' => $this->getJumlahPetani(),
        ]);
    }
}
