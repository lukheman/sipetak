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

    public ?string $penanganan;

    public function terimaLaporan() {
        $this->laporan?->update([
            'status' => StatusLaporan::IN_PROGRESS,
        ]);
    }

    public function tolakLaporan() {
        $this->laporan?->update([
            'status' => StatusLaporan::REJECTED,
        ]);
    }

    public function selesaiLaporan() {
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

    public function store(array $penyebabSerangan): void
    {
        $this->validate();

        $laporanSerangan = LaporanSerangan::query()->create([
            'id_tanaman' => $this->tanaman->id,
            'id_user' => getActiveUserId(),
            'tanggal_laporan' => now(),
            'deskripsi' => $this->deskripsi,
        ]);

        $laporanSerangan->penyebabSerangan()->attach($penyebabSerangan);

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        if ($this->laporan) {
            $this->laporan->update([
                'tanggal_laporan' => $this->tanggal_laporan,
                'deskripsi' => $this->deskripsi,
                'status' => $this->status,
            ]);
            $this->reset();
        }
    }

    public function updatePenanganan(): void
    {
        $this->laporan?->penanganan()->updateOrCreate(
            ['id_laporan_serangan' => $this->laporan->id],
            ['isi_penanganan' => $this->penanganan,
            'id_user' => getActiveUserId(),]
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
