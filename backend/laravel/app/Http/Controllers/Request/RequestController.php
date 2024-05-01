<?php

namespace App\Http\Controllers\Request;

use App\Actions\Order\DeleteOrderAction;
use App\Actions\Request\StoreRequestAction;
use App\Data\Order\OrderData;
use App\Data\Request\RequestData;
use App\Data\Request\StoreRequestData;
use App\Http\Controllers\Controller;
use App\Models\Request;
use Illuminate\Http\JsonResponse;

class RequestController extends Controller
{
    public function index()
    {
        return RequestData::collect(Request::all());
    }

    public function show(Request $request): OrderData
    {
        return OrderData::fromModel($request);
    }

    public function store(): JsonResponse
    {
        return response()->json(StoreRequestAction::execute(StoreRequestData::fromRequest(auth()->user())), 201);
    }

    public function destroy(Request $request): JsonResponse
    {
        return DeleteOrderAction::execute($request);
    }
}
