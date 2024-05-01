<?php

namespace App\Http\Controllers\Request;

use App\Actions\Request\DeleteRequestAction;
use App\Actions\Request\StoreRequestAction;
use App\Data\Request\RequestData;
use App\Data\Request\StoreRequestData;
use App\Http\Controllers\Controller;
use App\Models\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::where('user_id', auth()->user()->id)->get();

        return RequestData::collect($requests);
    }

    public function show(Request $request): RequestData
    {
        return RequestData::fromModel($request);
    }

    public function store(HttpRequest $request): JsonResponse
    {
        return response()->json(StoreRequestAction::execute(StoreRequestData::fromRequest($request, auth()->user())), 201);
    }

    public function destroy(Request $request): JsonResponse
    {
        return DeleteRequestAction::execute($request);
    }
}
