<?php

namespace App\Actions\Order;

use App\Exceptions\Order\OrderAlreadyConfirmedOrDoneException;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;

class DeleteOrderAction
{
    public static function execute(Order $order): JsonResponse
    {
        throw_unless($order->isCreated(), OrderAlreadyConfirmedOrDoneException::class);

        OrderItem::where('order_id', $order->id)->delete();
        $order->delete();

        return response()->json(['message' => 'Заказ успешно удален']);
    }
}
