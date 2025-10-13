<?php

namespace App\Livewire\Forms;

use App\Models\Desa;
use App\Models\Kecamatan;
use Livewire\Attributes\Validate;
use Livewire\Form;

class WilayahForm extends Form
{
    public ?Kecamatan $wilayah = null;

    public string $nama = '';

    public string $newDesa = '';

    public function fillFromModel(Kecamatan $wilayah)
    {
        $wilayah->load('desa');

        $this->wilayah = $wilayah;
        $this->nama = $wilayah->nama;
    }

    public function store()
    {
        Kecamatan::create([
            'nama' => $this->nama,
        ]);
        $this->reset('nama');
    }

    public function deleteDesa($id_desa) {
        // $this->wilayah->desa()->query()->where('id_desa', $id_desa)->delete();
        Desa::query()->where('id_desa', $id_desa)->delete();
    }

    public function storeDesa() {
        $this->wilayah->desa()->create([
            'nama' => $this->newDesa
        ]);
        $this->reset('newDesa');
    }

    public function update()
    {
        $this->wilayah->update([
            'nama' => $this->nama,
        ]);
    }

    public function delete()
    {
        $this->wilayah->delete();
    }
}
