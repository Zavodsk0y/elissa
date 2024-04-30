<?php

namespace App\Http\Controllers\Order;

use App\Data\Order\OrderStatusData;
use App\Http\Controllers\Controller;
use App\Models\Order;

class UpdateOrderStatusController extends Controller
{
    public function __invoke(Order $order, OrderStatusData $orderStatusData)
    {
        $orderStatusData->status->updateStatus($order);

        return response()->json(['message' => 'Статус успешно обновлен', 'order' => $order]);
    }
}
