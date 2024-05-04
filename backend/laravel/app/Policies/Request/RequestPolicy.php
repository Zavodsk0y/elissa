<?php

namespace App\Policies\Request;

use App\Models\Request;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Request $request)
    {
        return $user->id === $request->user_id;
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('request interaction');
    }

    public function updateStatus(User $user): bool
    {
        return $user->hasPermissionTo('request status update');
    }

    public function destroy(User $user): bool
    {
        return $user->hasPermissionTo('request interaction');
    }
}
