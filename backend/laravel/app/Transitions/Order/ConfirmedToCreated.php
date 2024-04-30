<?php

namespace App\Transitions\Order;

use App\Enums\Order\OrderStatus;
use App\Exceptions\Order\CannotChangeOrderStatusException;
use App\Models\Order;
use App\Models\OrderStatusHistory;

class ConfirmedToCreated
{
    public static function execute(Order $order): Order
    {
        throw_unless($order->isConfirmed(), new CannotChangeOrderStatusException());

        $previousStatus = $order->status;
        $order->status = OrderStatus::Created->value;
        $order->activated_at = null;
        $order->save();

        OrderStatusHistory::create([
            'order_id' => $order->id,
            'previous_status' => $previousStatus,
            'new_status' => $order->status,
            'changed_by_user_id' => auth()->user()->id,
        ]);

        return $order->refresh();
    }
}
