<?php

namespace App\Livewire\Profile;

use App\Livewire\Forms\UserForm;
use App\Traits\WithNotify;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{

    public UserForm $form;
    use WithFileUploads;
    use WithNotify;

    public $desaUser;
    public $kecamatanUser;

    public function mount() {
        $user = getActiveUser();
        $user->load('desa.kecamatan');

        $this->desaUser = $user->desa ? $user->desa->nama : '-';
        $this->kecamatanUser = $user->desa->kecamatan ? $user->desa->kecamatan->nama : '-';

        $this->form->fillFromModel($user);
    }

    public function save()
    {
            $this->form->update();

            $this->notifySuccess('Berhasil menyimpan perubahan profile');

    }

    public function render()
    {
        return view('livewire.profile.user-profile');
    }
}
