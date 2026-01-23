<?php

namespace App\Livewire\Table;

use App\Enums\State;
use App\Livewire\Forms\UserForm;
use App\Models\Admin;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\KepalaDinas;
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

    public string $userType = 'petani'; // 'petani', 'penyuluh', 'admin', 'kepala_dinas'

    public $kecamatanList;
    public $desaList;
    public $selectedDesa;
    public $selectedKecamatan;
    public $kecamatan;

    /**
     * Get user type labels for display
     */
    public array $userTypeLabels = [
        'petani' => 'Petani',
        'penyuluh' => 'Penyuluh',
        'admin' => 'Admin',
        'kepala_dinas' => 'Kepala Dinas',
    ];

    public function mount()
    {
        $this->kecamatanList = Kecamatan::all();
        $this->desaList = collect();
    }

    public function updatedKecamatan($value)
    {
        $this->desaList = $value ? Desa::where('id_kecamatan', $value)->get() : collect();
    }

    /**
     * Get the model class based on user type
     */
    protected function getModelClass(): string
    {
        return match ($this->userType) {
            'penyuluh' => Penyuluh::class,
            'admin' => Admin::class,
            'kepala_dinas' => KepalaDinas::class,
            default => Petani::class,
        };
    }

    /**
     * Get the primary key name based on user type
     */
    protected function getPrimaryKeyName(): string
    {
        return match ($this->userType) {
            'penyuluh' => 'id_penyuluh',
            'admin' => 'id_admin',
            'kepala_dinas' => 'id_kepala_dinas',
            default => 'id_petani',
        };
    }

    /**
     * Get the name field based on user type
     */
    protected function getNameField(): string
    {
        return match ($this->userType) {
            'admin' => 'nama_admin',
            'kepala_dinas' => 'nama_kepala_dinas',
            default => 'nama',
        };
    }

    /**
     * Check if current user type requires desa (location)
     */
    public function requiresDesa(): bool
    {
        return in_array($this->userType, ['petani', 'penyuluh']);
    }

    #[Computed]
    public function users()
    {
        $model = $this->getModelClass();
        $nameField = $this->getNameField();

        return $model::query()
            ->when($this->search, function ($query) use ($nameField) {
                $query->where($nameField, 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');

                // Only add telepon search for models that have it
                if (in_array($this->userType, ['petani', 'penyuluh', 'kepala_dinas'])) {
                    $query->orWhere('telepon', 'like', '%' . $this->search . '%');
                }
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
        $model = $this->getModelClass();
        $user = $model::query()->find($id);

        if ($this->requiresDesa() && $user->desa) {
            $this->kecamatan = $user->desa->id_kecamatan ?? null;
            $this->selectedDesa = $user->desa->nama ?? null;
            $this->selectedKecamatan = $user->desa?->kecamatan?->nama ?? null;
            $this->updatedKecamatan($this->kecamatan);
        }

        $this->form->fillFromModel($user, $this->userType);

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
        $model = $this->getModelClass();
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
