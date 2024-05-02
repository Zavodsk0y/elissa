<?php

namespace App\Http\Controllers\Order;

use App\Data\Order\OrderStatusData;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;

class UpdateOrderStatusController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Order $order, OrderStatusData $orderStatusData): JsonResponse
    {
        $this->authorize('updateStatus', Order::class);

        $orderStatusData->status->updateStatus($order);

        return response()->json(['message' => 'Статус успешно обновлен', 'order' => $order]);
    }
}
