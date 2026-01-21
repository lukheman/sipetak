<?php

namespace App\Livewire\Table;

use App\Enums\State;
use App\Livewire\Forms\UserForm;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Petani;
use App\Models\Penyuluh;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Manajemen Pengguna')]
class PenggunaTable extends Component
{
    use WithModal;
    use WithNotify;
    use WithPagination;

    public UserForm $form;

    public $currentState = State::CREATE;

    public string $idModal = 'modal-form-pengguna';

    public string $search = '';

    public string $userType = 'petani'; // 'petani' or 'penyuluh'

    public $kecamatanList;
    public $desaList;
    public $selectedDesa;
    public $selectedKecamatan;
    public $kecamatan;

    public function mount()
    {
        $this->kecamatanList = Kecamatan::all();
        $this->desaList = collect();
    }

    public function updatedKecamatan($value)
    {
        $this->desaList = $value ? Desa::where('id_kecamatan', $value)->get() : collect();
    }

    #[Computed]
    public function users()
    {
        $model = $this->userType === 'penyuluh' ? Penyuluh::class : Petani::class;

        return $model::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('telepon', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);
    }

    public function setUserType($type)
    {
        $this->userType = $type;
        $this->resetPage();
    }

    public function add()
    {
        $this->form->reset();
        $this->form->userType = $this->userType;
        $this->currentState = State::CREATE;
        $this->openModal($this->idModal);
    }

    public function detail($id)
    {
        $model = $this->userType === 'penyuluh' ? Penyuluh::class : Petani::class;
        $user = $model::query()->find($id);

        $this->kecamatan = $user->desa->id_kecamatan ?? null;
        $this->selectedDesa = $user->desa->nama ?? null;
        $this->selectedKecamatan = $user->desa?->kecamatan?->nama ?? null;

        $this->form->fillFromModel($user, $this->userType);
        $this->updatedKecamatan($this->kecamatan);

        $this->currentState = State::SHOW;
        $this->openModal($this->idModal);
    }

    public function edit($id)
    {
        $this->detail($id);
        $this->currentState = State::UPDATE;
    }

    public function save()
    {
        if ($this->currentState === State::CREATE) {
            $this->form->store();
            $this->notifySuccess('Pengguna berhasil ditambahkan!');
        } elseif ($this->currentState === State::UPDATE) {
            $this->form->update();
            $this->notifySuccess('Pengguna berhasil diperbarui!');
        }

        $this->closeModal($this->idModal);
    }

    public function delete($id)
    {
        $model = $this->userType === 'penyuluh' ? Penyuluh::class : Petani::class;
        $this->form->user = $model::query()->find($id);
        $this->form->userType = $this->userType;
        $this->dispatch('deleteConfirmation', message: 'Yakin untuk menghapus pengguna ini?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed()
    {
        try {
            $this->form->delete();
            $this->notifySuccess('Pengguna berhasil dihapus!');
        } catch (\Exception $e) {
            $this->notifyError('Gagal menghapus pengguna: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.table.pengguna-table');
    }
}
