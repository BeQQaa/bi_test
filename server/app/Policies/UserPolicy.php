<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function __construct()
    {
    }

    public final function create(): Response
    {
        $user = auth()->user();
        return ($user->role === config('constants.ADMIN_NAME')
            || $user->TokenCan(config('constants.STORE_USERS')))
            ? Response::allow()
            : Response::deny();
    }

    public final function update(User $user, $id): Response
    {
        $user = auth()->user();
        return ($user->role === config('constants.ADMIN_NAME')
            || $user->TokenCan(config('constants.STORE_USERS'))
            || $id == auth()->user()->id)
            ? Response::allow()
            : Response::deny();
    }

    public final function delete(User $user, $id): Response
    {
        $user = auth()->user();
        return ($user->role === config('constants.ADMIN_NAME')
            || $user->TokenCan(config('constants.STORE_USERS'))
            || $id == auth()->user()->id)
            ? Response::allow()
            : Response::deny();
    }
}
