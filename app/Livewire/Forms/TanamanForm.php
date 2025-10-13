<?php

namespace App\Livewire\Forms;

use App\Models\Tanaman;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TanamanForm extends Form
{
    public ?Tanaman $tanaman = null;

    public string $nama_tanaman = '';
    public string $deskripsi = '';
    public $gambar;

    public function rules(): array
    {
        return [
            'nama_tanaman' => ['required', 'string', 'min:3', 'max:100'],
            'gambar' => ['nullable', 'max:2048'],
            'deskripsi' => ['nullable', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'nama_tanaman.required' => 'Nama tanaman wajib diisi.',
            'nama_tanaman.min' => 'Nama tanaman minimal 3 karakter.',
            'nama_tanaman.max' => 'Nama tanaman maksimal 100 karakter.',

            'deskripsi.string' => 'Deskripsi hanya boleh berisi huruf atau karakter yang valid.',

            'gambar.max' => 'Ukuran gambar maksimal 2MB.',

        ];
    }

    /**
     * Load data ke form saat edit
     */
    public function fillFromModel(Tanaman $tanaman): void
    {
        $this->tanaman = $tanaman;
        $this->nama_tanaman = $tanaman->nama_tanaman;
        $this->gambar = $tanaman->gambar;
        $this->deskripsi = $tanaman->deskripsi;
    }

    /**
     * Store data baru
     */
    public function store(): void
    {
        $tanaman = Tanaman::query()->create($this->validate());

        if ($this->gambar) {
            // Store new gambar
            $path = $this->gambar->store('tanaman', 'public');
            $tanaman->update([
                'gambar' => $path
            ]);
        }

        $this->reset();
    }

    /**
     * Update data tanaman yang sudah ada
     */
    public function update(): void
    {
        $this->validate();

        $this->tanaman->update([
            'nama_tanaman' => $this->nama_tanaman,
            'deskripsi' => $this->deskripsi,
        ]);

        if ($this->gambar) {

            // Delete old gambar if exists
            if ($this->tanaman->gambar) {
                Storage::disk('public')->delete($this->tanaman->gambar);
            }

            // Store new gambar
            $path = $this->gambar->store('tanaman', 'public');
            $this->tanaman->update([
                'gambar' => $path
            ]);
        }

        $this->reset();

    }

    /**
     * Hapus data tanaman
     */
    public function delete(): void
    {
        if ($this->tanaman) {
            $this->tanaman->delete();
            $this->reset();
        }
    }

}
