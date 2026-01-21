<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MultiAuth
{
    /**
     * List of all authentication guards to check.
     */
    protected array $guards = ['petani', 'penyuluh', 'admin', 'kepala_dinas'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles  daftar role yang boleh akses
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Check if user is authenticated in any guard
        $authenticatedGuard = null;
        foreach ($this->guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $authenticatedGuard = $guard;
                break;
            }
        }

        if (!$authenticatedGuard) {
            return redirect()->route('login');
        }

        $user = Auth::guard($authenticatedGuard)->user();

        // Jika tidak diberikan parameter role, cukup lanjut
        if (empty($roles)) {
            return $next($request);
        }

        // Get role value - handle both Role enum and string
        $userRole = $user->role;
        $roleValue = $userRole instanceof \App\Enums\Role ? $userRole->value : $userRole;

        // Jika role user tidak ada dalam daftar yang diizinkan
        if (!in_array($roleValue, $roles)) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
