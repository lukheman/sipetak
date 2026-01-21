<?php

namespace App\Livewire\Forms;

use App\Models\Petani;
use App\Models\Penyuluh;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Form;

class UserForm extends Form
{
    public $user;

    public string $userType = 'petani'; // 'petani' or 'penyuluh'

    public string $nama = '';

    public string $email = '';

    public string $password = '';

    public string $telepon = '';

    public ?int $id_desa = null;

    public $photo;

    protected function rules(): array
    {
        $table = $this->userType === 'penyuluh' ? 'penyuluh' : 'petani';
        $primaryKey = $this->userType === 'penyuluh' ? 'id_penyuluh' : 'id_petani';
        $ignoreId = $this->user ? $this->user->$primaryKey : null;

        $rules = [
            'nama' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique($table, 'email')->ignore($ignoreId, $primaryKey),
            ],
            'password' => ['nullable', 'string', 'min:4'],
            'telepon' => [
                'required',
                'regex:/^0[0-9]{9,14}$/',
                'numeric'
            ],
            'id_desa' => 'required|exists:desa,id_desa',
        ];

        // Validasi file hanya jika upload baru
        if ($this->photo instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
            $rules['photo'] = ['nullable', 'image', 'max:2048'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Mohon masukkan nama Anda (maksimal 255 karakter).',
            'nama.string' => 'Nama hanya boleh berisi huruf atau karakter yang valid.',
            'nama.max' => 'Nama maksimal 255 karakter.',

            'email.required' => 'Mohon masukkan email Anda.',
            'email.email' => 'Mohon masukkan email yang valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email telah terdaftar.',

            'password.required' => 'Mohon masukkan kata sandi (minimal 4 karakter).',
            'password.string' => 'Kata sandi hanya boleh berisi huruf atau karakter yang valid.',
            'password.min' => 'Kata sandi minimal 4 karakter.',

            'telepon.required' => 'Mohon masukkan nomor telepon Anda.',
            'telepon.regex' => 'Nomor telepon harus format Indonesia, diawali 0, dan panjang 10–15 digit.',
            'telepon.numeric' => 'Nomor telepon hanya boleh berisi angka',

            'id_desa.required' => 'Silakan pilih desa.',
            'id_desa.exists' => 'Desa yang dipilih tidak tersedia di sistem.',

            'photo.image' => 'File yang diunggah harus berupa gambar (jpeg, png, bmp, gif, svg, atau webp).',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }

    public function store()
    {
        $validated = $this->validate();

        $data = [
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'telepon' => $validated['telepon'],
            'id_desa' => $validated['id_desa'],
        ];

        if ($this->userType === 'penyuluh') {
            Penyuluh::query()->create($data);
        } else {
            Petani::query()->create($data);
        }

        $this->reset();
    }

    public function update()
    {
        $validated = $this->validate();

        $data = [
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'],
            'id_desa' => $validated['id_desa'],
        ];

        // Only update password if provided
        if (!empty($validated['password'])) {
            $data['password'] = bcrypt($validated['password']);
        }

        $this->user->update($data);

        if ($this->photo instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
            // Hapus foto lama jika ada
            if ($this->user->photo) {
                Storage::disk('public')->delete($this->user->photo);
            }

            // Simpan foto baru
            $path = $this->photo->store('photos', 'public');
            $this->user->update(['photo' => $path]);
        }
    }

    public function delete()
    {
        $this->user->delete();
        $this->reset();
    }

    public function fillFromModel(Model $user, string $userType): void
    {
        $this->user = $user;
        $this->userType = $userType;
        $this->nama = $user->nama;
        $this->telepon = $user->telepon;
        $this->email = $user->email;
        $this->id_desa = $user->id_desa;
        $this->photo = $user->photo;
    }
}
