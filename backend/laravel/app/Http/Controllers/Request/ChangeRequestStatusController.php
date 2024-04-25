<?php

namespace app\Http\Controllers\Request;

use app\Data\Request\RequestStatusData;
use App\Http\Controllers\Controller;
use App\Models\Request;

class ChangeRequestStatusController extends Controller
{
    public function __invoke(Request $request, RequestStatusData $data)
    {
        return $data->status->updateStatus($request)->getData();
    }
}
