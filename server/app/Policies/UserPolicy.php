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
        return auth()->user()->role === config('constants.ADMIN_NAME')
            ? Response::allow()
            : Response::deny();
    }

    public final function update(User $user, $id): Response
    {
        return (auth()->user()->role === config('constants.ADMIN_NAME') and $id == auth()->user()->id)
            ? Response::allow()
            : Response::deny();
    }

    public final function delete(): Response
    {
        return auth()->user()->role === config('constants.ADMIN_NAME')
            ? Response::allow()
            : Response::deny();
    }
}
