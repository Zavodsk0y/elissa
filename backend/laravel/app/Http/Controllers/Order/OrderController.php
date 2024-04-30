<?php

namespace App\Http\Controllers\Order;

use App\Actions\Order\StoreOrderAction;
use App\Data\Order\StoreOrderData;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function store()
    {
        return response()->json(StoreOrderAction::execute(StoreOrderData::fromRequest(auth()->user())), 201);
    }
}
