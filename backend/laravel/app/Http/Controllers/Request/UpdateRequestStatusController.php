<?php

namespace App\Http\Controllers\Request;

use App\Data\Request\RequestStatusData;
use App\Http\Controllers\Controller;
use App\Models\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;

class UpdateRequestStatusController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Request $request, RequestStatusData $requestStatusData): JsonResponse
    {
        $this->authorize('updateStatus', Request::class);

        $requestStatusData->status->updateStatus($request);

        return response()->json(['message' => 'Статус успешно обновлен', 'request' => $request]);
    }
}
