<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MultiAuth
{
/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles  daftar role yang boleh akses
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Jika tidak diberikan parameter role, cukup lanjut
        if (empty($roles)) {
            return $next($request);
        }

        // Jika role user tidak ada dalam daftar yang diizinkan
        if (!in_array($user->role->value, $roles)) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
