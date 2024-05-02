<?php

namespace App\Policies\Category;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('category add');
    }

    public function update(User $user): bool
    {
        return $user->hasPermissionTo('category update');
    }

    public function destroy(User $user): bool
    {
        return $user->hasPermissionTo('category delete');
    }
}
