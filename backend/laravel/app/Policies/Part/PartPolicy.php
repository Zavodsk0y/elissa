<?php

namespace App\Policies\Part;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('part add');
    }

    public function update(User $user): bool
    {
        return $user->hasPermissionTo('part update');
    }

    public function destroy(User $user): bool
    {
        return $user->hasPermissionTo('part delete');
    }
}
