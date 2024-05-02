<?php

namespace App\Policies\Cart;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    public function show(User $user): bool
    {
        return $user->hasPermissionTo('cart interaction');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('cart interaction');
    }

    public function destroy(User $user): bool
    {
        return $user->hasPermissionTo('cart interaction');
    }
}
