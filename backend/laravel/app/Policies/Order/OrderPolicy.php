<?php

namespace App\Policies\Order;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('order interaction');
    }

    public function updateStatus(User $user): bool
    {
        return $user->hasPermissionTo('order status update');
    }

    public function destroy(User $user): bool
    {
        return $user->hasPermissionTo('order interaction');
    }
}
