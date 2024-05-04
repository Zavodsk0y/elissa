<?php

namespace App\Http\Controllers\Admin;

use App\Data\Order\OrderData;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GetUserOrdersController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(User $user)
    {
        $this->authorize('view-users', User::class);

        $orders = Order::where('user_id', $user->id)
            ->with(['items.part'])
            ->get();

        $data = $orders->map(function ($order) {
            return OrderData::fromModel($order);
        });

        return response()->json(['orders' => $data]);
    }
}
