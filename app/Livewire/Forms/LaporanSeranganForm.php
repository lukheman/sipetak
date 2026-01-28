<?php

namespace App\Livewire\Forms;

use App\Enums\StatusLaporan;
use App\Models\LaporanSerangan;
use App\Models\Tanaman;
use Livewire\Form;

class LaporanSeranganForm extends Form
{
    public ?LaporanSerangan $laporan;

    public string $deskripsi = '';
    public ?Tanaman $tanaman;
    public array $selectedPenyebabSerangan = [];

    public ?string $penanganan;

    public function terimaLaporan()
    {
        $this->laporan?->update([
            'status' => StatusLaporan::IN_PROGRESS,
        ]);
    }

    public function tolakLaporan()
    {
        $this->laporan?->update([
            'status' => StatusLaporan::REJECTED,
        ]);
    }

    public function selesaiLaporan()
    {
        $this->laporan?->update([
            'status' => StatusLaporan::RESOLVED,
        ]);
    }

    public function rules(): array
    {
        return [
            'deskripsi' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal_laporan.required' => 'Tanggal laporan wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
        ];
    }

    public function fillFromId(int $id): void
    {
        $laporan = LaporanSerangan::query()->find($id);
        $this->fillFromModel($laporan);
    }

    public function fillFromModel(LaporanSerangan $laporan): void
    {
        $laporan->load('penanganan');
        $this->laporan = $laporan;
        $this->deskripsi = $laporan->deskripsi;
        $this->penanganan = $laporan->penanganan->isi_penanganan ?? null;
    }

    public function store(): void
    {
        $this->validate();

        $laporan = LaporanSerangan::query()->create([
            'id_tanaman' => $this->tanaman->id,
            'id_petani' => getActiveUserId(),
            'tanggal_laporan' => now(),
            'deskripsi' => $this->deskripsi,
        ]);

        // Sync penyebab serangan to pivot table
        if (!empty($this->selectedPenyebabSerangan)) {
            $laporan->penyebabSerangan()->sync($this->selectedPenyebabSerangan);
        }

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        if ($this->laporan) {
            $this->laporan->update([
                'deskripsi' => $this->deskripsi,
            ]);
            $this->reset();
        }
    }

    public function updatePenanganan(): void
    {
        $this->laporan?->penanganan()->updateOrCreate(
            ['id_laporan_serangan' => $this->laporan->id],
            [
                'isi_penanganan' => $this->penanganan,
                'id_penyuluh' => getActiveUserId(),
            ]
        );

    }


    public function delete(): void
    {
        if ($this->laporan) {
            $this->laporan->delete();
            $this->reset();
        }
    }
}
