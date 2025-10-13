<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // contoh di controller logout
        auth()->logout();

        // clear session
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        flash('Berhasil keluar dari aplikasi');

        return to_route('login');
    }
}
