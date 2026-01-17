<?php

namespace App\Livewire\Table;

use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\PenyebabSerangan;
use App\Enums\State;
use App\Livewire\Forms\PenyebabSeranganForm;
use Livewire\WithPagination;

#[Title('Penyebab Serangan')]
class PenyebabSeranganTable extends Component
{
    use WithPagination;
    use WithNotify;
    use WithModal;

    public PenyebabSeranganForm $form;

    public $currentState = State::CREATE;

    public string $idModal = 'modal-form-penyebab-serangan';

    public string $search = '';

    public string $activeTab = 'all';

    #[Computed]
    public function penyebabSerangan()
    {
        return PenyebabSerangan::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->when($this->activeTab !== 'all', function ($query) {
                $query->where('tipe', $this->activeTab);
            })
            ->latest()
            ->paginate(10);
    }

    #[Computed]
    public function countAll(): int
    {
        return PenyebabSerangan::count();
    }

    #[Computed]
    public function countHama(): int
    {
        return PenyebabSerangan::where('tipe', PenyebabSerangan::TIPE_HAMA)->count();
    }

    #[Computed]
    public function countPenyakit(): int
    {
        return PenyebabSerangan::where('tipe', PenyebabSerangan::TIPE_PENYAKIT)->count();
    }

    public function setActiveTab(string $tab): void
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }

    public function add()
    {
        $this->form->reset();
        $this->currentState = State::CREATE;
        $this->openModal($this->idModal);
    }

    public function detail($id)
    {
        $penyebab = PenyebabSerangan::findOrFail($id);
        $this->form->fillFromModel($penyebab);
        $this->openModal($this->idModal);
        $this->currentState = State::SHOW;
    }

    public function edit(int $id)
    {
        $this->detail($id);
        $this->currentState = State::UPDATE;
    }

    public function save()
    {
        if ($this->currentState === State::CREATE) {
            $this->form->store();
            $this->notifySuccess('Penyebab serangan berhasil ditambahkan!');
        } elseif ($this->currentState === State::UPDATE) {
            $this->form->update();
            $this->notifySuccess('Penyebab serangan berhasil diperbarui!');
        }

        $this->closeModal($this->idModal);
    }

    public function delete(int $id)
    {
        $this->form->penyebabSerangan = PenyebabSerangan::findOrFail($id);
        $this->dispatch('deleteConfirmation', message: 'Yakin untuk menghapus penyebab serangan ini?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed()
    {
        try {
            $this->form->delete();
            $this->notifySuccess('Penyebab serangan berhasil dihapus!');
        } catch (\Exception $e) {
            $this->notifyError('Gagal menghapus penyebab serangan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.table.penyebab-serangan-table');
    }
}

