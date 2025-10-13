<?php

use App\Enums\Role;

if (! function_exists('getActiveGuard')) {
    function getActiveGuard()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }

        return null;
    }
}

if (! function_exists('getActiveUser')) {
    function getActiveUser()
    {
        return auth()->user();

    }
}

if (! function_exists('getActiveUserId')) {
    function getActiveUserId()
    {
        $user = getActiveUser();

        return $user->id;

    }
}

if (! function_exists('getActiveUserRole')) {
    function getActiveUserRole()
    {
        $user = getActiveUser();

        return $user->role;

    }
}
