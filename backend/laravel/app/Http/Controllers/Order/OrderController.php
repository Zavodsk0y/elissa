<?php

namespace App\Http\Controllers\Order;

use App\Actions\Order\DeleteOrderAction;
use App\Actions\Order\StoreOrderAction;
use App\Data\Order\StoreOrderData;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function store(): JsonResponse
    {
        return response()->json(StoreOrderAction::execute(StoreOrderData::fromRequest(auth()->user())), 201);
    }

    public function destroy(Order $order): JsonResponse
    {
        return DeleteOrderAction::execute($order);
    }
}
