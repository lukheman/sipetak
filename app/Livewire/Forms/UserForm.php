<?php

namespace App\Livewire\Forms;

use App\Models\Admin;
use App\Models\KepalaDinas;
use App\Models\Petani;
use App\Models\Penyuluh;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Form;

class UserForm extends Form
{
    public $user;

    public string $userType = 'petani'; // 'petani', 'penyuluh', 'admin', 'kepala_dinas'

    public string $nama = '';

    public string $email = '';

    public string $password = '';

    public string $telepon = '';

    public ?int $id_desa = null;

    public ?string $tanggal_lahir = null;

    public $photo;

    /**
     * Get table and primary key info based on user type
     */
    protected function getTableInfo(): array
    {
        return match ($this->userType) {
            'penyuluh' => ['table' => 'penyuluh', 'primaryKey' => 'id_penyuluh', 'nameField' => 'nama'],
            'admin' => ['table' => 'admin', 'primaryKey' => 'id_admin', 'nameField' => 'nama_admin'],
            'kepala_dinas' => ['table' => 'kepala_dinas', 'primaryKey' => 'id_kepala_dinas', 'nameField' => 'nama_kepala_dinas'],
            default => ['table' => 'petani', 'primaryKey' => 'id_petani', 'nameField' => 'nama'],
        };
    }

    /**
     * Check if current user type requires desa
     */
    protected function requiresDesa(): bool
    {
        return in_array($this->userType, ['petani', 'penyuluh']);
    }

    /**
     * Check if current user type requires telepon
     */
    protected function requiresTelepon(): bool
    {
        return in_array($this->userType, ['petani', 'penyuluh', 'kepala_dinas']);
    }

    /**
     * Check if current user type requires tanggal_lahir
     */
    protected function requiresTanggalLahir(): bool
    {
        return $this->userType === 'kepala_dinas';
    }

    protected function rules(): array
    {
        $info = $this->getTableInfo();
        $ignoreId = $this->user ? $this->user->{$info['primaryKey']} : null;

        $rules = [
            'nama' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique($info['table'], 'email')->ignore($ignoreId, $info['primaryKey']),
            ],
            'password' => ['nullable', 'string', 'min:4'],
        ];

        // Telepon validation for types that require it
        if ($this->requiresTelepon()) {
            $rules['telepon'] = [
                'required',
                'regex:/^0[0-9]{9,14}$/',
                'numeric'
            ];
        }

        // Desa validation for types that require it
        if ($this->requiresDesa()) {
            $rules['id_desa'] = 'required|exists:desa,id_desa';
        }

        // Tanggal lahir validation for kepala dinas
        if ($this->requiresTanggalLahir()) {
            $rules['tanggal_lahir'] = 'required|date';
        }

        // Photo validation
        if ($this->photo instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
            $rules['photo'] = ['nullable', 'image', 'max:2048'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Mohon masukkan nama (maksimal 255 karakter).',
            'nama.string' => 'Nama hanya boleh berisi huruf atau karakter yang valid.',
            'nama.max' => 'Nama maksimal 255 karakter.',

            'email.required' => 'Mohon masukkan email.',
            'email.email' => 'Mohon masukkan email yang valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email telah terdaftar.',

            'password.required' => 'Mohon masukkan kata sandi (minimal 4 karakter).',
            'password.string' => 'Kata sandi hanya boleh berisi huruf atau karakter yang valid.',
            'password.min' => 'Kata sandi minimal 4 karakter.',

            'telepon.required' => 'Mohon masukkan nomor telepon.',
            'telepon.regex' => 'Nomor telepon harus format Indonesia, diawali 0, dan panjang 10–15 digit.',
            'telepon.numeric' => 'Nomor telepon hanya boleh berisi angka',

            'id_desa.required' => 'Silakan pilih desa.',
            'id_desa.exists' => 'Desa yang dipilih tidak tersedia di sistem.',

            'tanggal_lahir.required' => 'Mohon masukkan tanggal lahir.',
            'tanggal_lahir.date' => 'Format tanggal tidak valid.',

            'photo.image' => 'File yang diunggah harus berupa gambar (jpeg, png, bmp, gif, svg, atau webp).',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }

    public function store()
    {
        $validated = $this->validate();
        $info = $this->getTableInfo();

        $data = [
            $info['nameField'] => $validated['nama'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ];

        if ($this->requiresTelepon()) {
            $data['telepon'] = $validated['telepon'];
        }

        if ($this->requiresDesa()) {
            $data['id_desa'] = $validated['id_desa'];
        }

        if ($this->requiresTanggalLahir()) {
            $data['tanggal_lahir'] = $validated['tanggal_lahir'];
        }

        $model = match ($this->userType) {
            'penyuluh' => Penyuluh::class,
            'admin' => Admin::class,
            'kepala_dinas' => KepalaDinas::class,
            default => Petani::class,
        };

        $model::query()->create($data);

        $this->reset();
    }

    public function update()
    {
        $validated = $this->validate();
        $info = $this->getTableInfo();

        $data = [
            $info['nameField'] => $validated['nama'],
            'email' => $validated['email'],
        ];

        if ($this->requiresTelepon()) {
            $data['telepon'] = $validated['telepon'];
        }

        if ($this->requiresDesa()) {
            $data['id_desa'] = $validated['id_desa'];
        }

        if ($this->requiresTanggalLahir()) {
            $data['tanggal_lahir'] = $validated['tanggal_lahir'];
        }

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

        // Get name based on user type
        $this->nama = match ($userType) {
            'admin' => $user->nama_admin ?? '',
            'kepala_dinas' => $user->nama_kepala_dinas ?? '',
            default => $user->nama ?? '',
        };

        $this->email = $user->email ?? '';
        $this->telepon = $user->telepon ?? '';
        $this->id_desa = $user->id_desa ?? null;
        $this->tanggal_lahir = $user->tanggal_lahir ?? null;
        $this->photo = $user->photo ?? null;
    }
}
