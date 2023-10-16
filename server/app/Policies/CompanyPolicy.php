<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
{
    public final function create(): Response
    {
        $user = auth()->user();
        return ($user->role === config('constants.ADMIN_NAME')
            || $user->TokenCan(config('constants.STORE_COMPANIES')))
            ? Response::allow()
            : Response::deny();
    }

    public final function update(User $user, $id): Response
    {
        $user = auth()->user();
        return ($user->role === config('constants.ADMIN_NAME')
            || $user->role === config('constants.UPDATE_COMPANIES')
            || $id == auth()->user()->id)
            ? Response::allow()
            : Response::deny();
    }

    public final function delete(User $user, $id): Response
    {
        $user = auth()->user();
        return ($user->role === config('constants.ADMIN_NAME')
            || $user->role === config('constants.DESTROY_COMPANIES')
            || $id == auth()->user()->id)
            ? Response::allow()
            : Response::deny();
    }
}
