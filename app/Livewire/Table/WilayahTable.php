<?php

namespace App\Livewire\Table;

use App\Models\Kecamatan;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Enums\State;
use App\Livewire\Forms\WilayahForm;
use Livewire\WithPagination;

#[Title('Manajemen Wilayah')]
class WilayahTable extends Component
{
    use WithPagination;
    use WithNotify;
    use WithModal;

    public WilayahForm $form;

    public $currentState = State::CREATE;

    public string $idModal = 'modal-form-wilayah';

    public string $search = '';

    public function addDesa() {
        $this->notifySuccess("Berhasil menambahkan desa");
        $this->form->storeDesa();
    }

    public function removeDesa($id_desa) {
        $this->form->deleteDesa($id_desa);
        $this->notifySuccess("Berhasil menghapus desa");
    }

    #[Computed]
    public function wilayah()
    {
        return Kecamatan::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->latest('id_kecamatan')
            ->paginate(10);
    }

    public function add()
    {
        $this->form->reset();
        $this->currentState = State::CREATE;
        $this->openModal($this->idModal);
    }

    public function detail($id)
    {
        $wilayah = Kecamatan::findOrFail($id);
        $this->form->fillFromModel($wilayah);
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
            $this->notifySuccess('Wilayah berhasil ditambahkan!');
        } elseif ($this->currentState === State::UPDATE) {
            $this->form->update();
            $this->notifySuccess('Wilayah berhasil diperbarui!');
        }

        $this->closeModal($this->idModal);
    }

    public function delete(int $id)
    {
        $this->form->wilayah = Kecamatan::findOrFail($id);
        $this->dispatch('deleteConfirmation', message: 'Yakin ingin menghapus wilayah ini?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed()
    {
        try {
            $this->form->delete();
            $this->notifySuccess('Wilayah berhasil dihapus!');
        } catch (\Exception $e) {
            $this->notifyError('Gagal menghapus wilayah: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.table.wilayah-table');
    }
}
