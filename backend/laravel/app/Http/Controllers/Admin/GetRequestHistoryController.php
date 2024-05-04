<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request;
use App\Models\RequestStatusHistory;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;

class GetRequestHistoryController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Request $request): JsonResponse
    {
        $this->authorize('history-interaction', User::class);

        $history = RequestStatusHistory::where('request_id', $request->id)->get();

        return response()->json(['history' => $history]);
    }
}
