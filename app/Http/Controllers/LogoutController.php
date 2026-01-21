<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * List of all authentication guards.
     */
    protected array $guards = ['petani', 'penyuluh', 'admin', 'kepala_dinas'];

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Logout from all guards
        foreach ($this->guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }

        // clear session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        flash('Berhasil keluar dari aplikasi');

        return to_route('login');
    }
}
