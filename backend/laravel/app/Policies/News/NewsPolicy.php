<?php

namespace App\Policies\News;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('news add');
    }

    public function update(User $user): bool
    {
        return $user->hasPermissionTo('news update');
    }

    public function destroy(User $user): bool
    {
        return $user->hasPermissionTo('news delete');
    }
}
