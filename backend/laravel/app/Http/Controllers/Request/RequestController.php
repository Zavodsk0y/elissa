<?php

namespace App\Http\Controllers\Request;

use App\Actions\Request\DeleteRequestAction;
use App\Actions\Request\StoreRequestAction;
use App\Data\Request\RequestData;
use App\Data\Request\StoreRequestData;
use App\Http\Controllers\Controller;
use App\Models\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $requests = Request::where('user_id', auth()->user()->id)->get();

        return RequestData::collect($requests);
    }

    public function show(Request $request): RequestData
    {
        $this->authorize('show', $request);

        return RequestData::fromModel($request);
    }

    public function store(HttpRequest $request): JsonResponse
    {
        $this->authorize('request interaction', Request::class);

        $request->request->add(['user_id' => auth()->user()->id]);
        $data = StoreRequestData::validateAndCreate($request, auth()->user());

        return response()->json(StoreRequestAction::execute($data), 201);
    }

    public function destroy(Request $request): JsonResponse
    {
        $this->authorize('request interaction', Request::class);

        return DeleteRequestAction::execute($request);
    }
}
