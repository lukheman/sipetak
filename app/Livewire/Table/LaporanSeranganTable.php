<?php

namespace App\Livewire\Table;

use App\Enums\Role;
use App\Enums\State;
use App\Livewire\Forms\LaporanSeranganForm;
use App\Models\LaporanSerangan;
use App\Models\PenyebabSerangan;
use App\Models\Tanaman;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Laporan Serangan')]
class LaporanSeranganTable extends Component
{
    use WithPagination;
    use WithModal;
    use WithNotify;

    public LaporanSeranganForm $form;

    public ?LaporanSerangan $selectedLaporan;

    public $currentState = State::CREATE;
    public string $idModal = 'modal-form-laporan-serangan';
    public string $search = '';

    public string $searchTanaman = '';

    public ?Tanaman $selectedTanaman;

    public array $selectedPenyebab = []; // id

    public function mount()
    {
        if (getActiveUserRole() === Role::KEPALADINAS) {

            $this->currentState = State::LAPORAN;

        }
    }

    public function terimaLaporan($id_laporan)
    {
        $this->form->fillFromId($id_laporan);
        $this->form->terimaLaporan();
        $this->notifySuccess('Laporan serangan telah diterima!');
        $this->closeModal('modal-detail-laporan-serangan');
    }

    public function tolakLaporan($id_laporan)
    {
        $this->form->fillFromId($id_laporan);
        $this->form->tolakLaporan();
        $this->notifySuccess('Laporan serangan telah ditolak!');
        $this->closeModal('modal-detail-laporan-serangan');
    }

    public function selesaiLaporan($id_laporan)
    {
        $this->form->fillFromId($id_laporan);
        $this->form->selesaiLaporan();
        $this->notifySuccess('Laporan serangan telah diselesaikan!');
        $this->closeModal('modal-detail-laporan-serangan');
    }

    public function simpanPenanganan()
    {
        $this->form->updatePenanganan();
        $this->notifySuccess('Penanganan berhasil disimpan!');
        $this->closeModal('modal-detail-laporan-serangan');
    }

    public function pilihTanaman($id)
    {
        $this->selectedTanaman = Tanaman::query()->find($id);
        $this->form->tanaman = $this->selectedTanaman;
    }

    public function batalPilihTanaman()
    {
        $this->selectedTanaman = null;
    }

    #[Computed]
    public function hamaList()
    {
        return PenyebabSerangan::where('tipe', PenyebabSerangan::TIPE_HAMA)->get();
    }

    #[Computed]
    public function penyakitList()
    {
        return PenyebabSerangan::where('tipe', PenyebabSerangan::TIPE_PENYAKIT)->get();
    }

    #[Computed]
    public function tanamanList()
    {
        return Tanaman::query()
            ->when($this->searchTanaman, fn($q) => $q->where('nama_tanaman', 'like', '%' . $this->searchTanaman . '%'))
            ->latest()
            ->get();
    }


    #[Computed]
    public function laporanSerangan()
    {
        $query = LaporanSerangan::query()
            ->when($this->search, fn($q) => $q->where('deskripsi', 'like', '%' . $this->search . '%'));

        if (getActiveUserRole() === Role::PETANI) {
            $query->where('id_petani', getActiveUserId());
        }

        return $query->latest()->paginate(10);

    }

    public function add()
    {
        $this->form->reset();
        $this->currentState = State::CREATE;
        $this->openModal('modal-form-search-tanaman');
    }

    public function detail($id)
    {
        $laporan = LaporanSerangan::query()
            ->with('tanaman')
            ->findOrFail($id);

        $this->selectedLaporan = $laporan;
        $this->form->fillFromModel($laporan);

        $this->openModal('modal-detail-laporan-serangan');
        $this->currentState = State::SHOW;
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
            $this->notifySuccess('Laporan serangan berhasil ditambahkan!');
        } elseif ($this->currentState === State::UPDATE) {
            $this->form->update();
            $this->notifySuccess('Laporan serangan berhasil diperbarui!');
        }

        $this->closeModal('modal-form-search-tanaman');
        $this->reset('selectedTanaman');
    }

    public function delete($id)
    {
        $this->form->laporan = LaporanSerangan::findOrFail($id);
        $this->dispatch('deleteConfirmation', message: 'Yakin ingin menghapus laporan ini?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed()
    {
        try {
            $this->form->delete();
            $this->notifySuccess('Laporan serangan berhasil dihapus!');
        } catch (\Exception $e) {
            $this->notifyError('Gagal menghapus laporan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.table.laporan-serangan-table');
    }
}
