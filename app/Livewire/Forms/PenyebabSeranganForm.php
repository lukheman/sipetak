<?php

namespace App\Livewire\Forms;

use App\Models\PenyebabSerangan;
use Livewire\Form;

class PenyebabSeranganForm extends Form
{
    public ?PenyebabSerangan $penyebabSerangan = null;

    public string $nama = '';
    public string $deskripsi = '';

    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'min:3', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama penyebab wajib diisi.',
            'nama.min' => 'Nama penyebab minimal 3 karakter.',
            'nama.max' => 'Nama penyebab maksimal 100 karakter.',
            'deskripsi.string' => 'Deskripsi harus berupa teks yang valid.',
        ];
    }

    /**
     * Load data ke form saat edit/detail
     */
    public function fillFromModel(PenyebabSerangan $penyebab): void
    {
        $this->penyebabSerangan = $penyebab;
        $this->nama = $penyebab->nama;
        $this->deskripsi = $penyebab->deskripsi ?? '';
    }

    /**
     * Store data baru
     */
    public function store(): void
    {
        PenyebabSerangan::create($this->validate());
        $this->reset();
    }

    /**
     * Update data yang sudah ada
     */
    public function update(): void
    {
        $this->validate();

        if ($this->penyebabSerangan) {
            $this->penyebabSerangan->update([
                'nama' => $this->nama,
                'deskripsi' => $this->deskripsi,
            ]);
        }

        $this->reset();
    }

    /**
     * Hapus data
     */
    public function delete(): void
    {
        if ($this->penyebabSerangan) {
            $this->penyebabSerangan->delete();
            $this->reset();
        }
    }
}
