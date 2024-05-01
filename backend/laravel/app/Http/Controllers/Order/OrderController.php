<?php

namespace App\Http\Controllers\Order;

use App\Actions\Order\DeleteOrderAction;
use App\Actions\Order\StoreOrderAction;
use App\Data\Order\OrderData;
use App\Data\Order\StoreOrderData;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        $user = auth()->user();

        $orders = Order::where('user_id', $user->id)
            ->with(['items.part'])
            ->get();

        $data = $orders->map(function ($order) {
            return OrderData::fromModel($order);
        });

        return response()->json(['orders' => $data]);
    }

    public function show(Order $order): OrderData
    {
        return OrderData::fromModel($order);
    }

    public function store(): JsonResponse
    {
        return response()->json(StoreOrderAction::execute(StoreOrderData::fromRequest(auth()->user())), 201);
    }

    public function destroy(Order $order): JsonResponse
    {
        return DeleteOrderAction::execute($order);
    }
}
