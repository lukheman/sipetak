<?php

use App\Enums\Role;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getActiveGuard')) {
    /**
     * Get the currently active authentication guard.
     *
     * @return string|null
     */
    function getActiveGuard(): ?string
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }

        return null;
    }
}

if (!function_exists('getActiveUser')) {
    /**
     * Get the currently authenticated user from any guard.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function getActiveUser()
    {
        $guard = getActiveGuard();

        if ($guard) {
            return Auth::guard($guard)->user();
        }

        return null;
    }
}

if (!function_exists('getActiveUserId')) {
    /**
     * Get the ID of the currently authenticated user.
     * Returns the appropriate primary key based on the guard.
     *
     * @return int|null
     */
    function getActiveUserId(): ?int
    {
        $user = getActiveUser();

        if (!$user) {
            return null;
        }

        $guard = getActiveGuard();

        // Return the appropriate primary key based on the model
        return match ($guard) {
            'petani' => $user->id_petani,
            'penyuluh' => $user->id_penyuluh,
            'admin' => $user->id_admin,
            'kepala_dinas' => $user->id_kepala_dinas,
            default => $user->id ?? null,
        };
    }
}

if (!function_exists('getActiveUserRole')) {
    /**
     * Get the role of the currently authenticated user.
     *
     * @return \App\Enums\Role|null
     */
    function getActiveUserRole(): ?Role
    {
        $user = getActiveUser();

        return $user?->role;
    }
}
