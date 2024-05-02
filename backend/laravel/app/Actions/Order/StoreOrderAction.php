<?php

namespace App\Actions\Order;

use App\Data\Order\OrderData;
use App\Data\Order\StoreOrderData;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class StoreOrderAction
{
    public static function execute(StoreOrderData $data): OrderData
    {
        $order = Order::create(
            [...$data->all()]
        );

        $cartItems = CartItem::where('user_id', $data->userId)->get();

        $cartItems->each(function ($item) use ($order) {
            OrderItem::create([
                'order_id' => $order->id,
                'part_id' => $item->part_id,
                'quantity' => $item->quantity,
            ]);
        });

        CartItem::where('user_id', $data->userId)->delete();

        return OrderData::fromModel($order);
    }
}
