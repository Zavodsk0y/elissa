<?php

namespace App\Policies\Request;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestPolicy
{
    use HandlesAuthorization;

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
