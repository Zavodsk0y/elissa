<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatusHistory;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GetOrderHistoryController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Order $order)
    {
        $this->authorize('history-interaction', User::class);

        $history = OrderStatusHistory::where('order_id', $order->id)->get();

        return response()->json(['history' => $history]);
    }
}
