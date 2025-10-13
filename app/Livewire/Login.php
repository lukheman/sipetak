<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.guest')]
class Login extends Component
{
    #[Rule(['required', 'email'])]
    public string $email = '';

    #[Rule(['required'])]
    public string $password = '';

    public ?string $redirect = null;

    public function messages(): array
    {
        return [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password harus diisi.',
        ];
    }

    public function mount()
    {
        $this->redirect = request()->query('redirect');
    }

    public function submit()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials, true)) {
            // regenerate session agar tidak session fixation
            request()->session()->regenerate();

            flash('Berhasil login.');

            return redirect()->intended($this->redirect ?? route('dashboard'));
        }

        return flash('Email atau password tidak valid.', 'danger');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
