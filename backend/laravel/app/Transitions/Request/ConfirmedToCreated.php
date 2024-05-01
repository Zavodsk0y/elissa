<?php

namespace App\Transitions\Request;

use App\Enums\Request\RequestStatus;
use App\Exceptions\Request\CannotChangeRequestStatusException;
use App\Models\Request;
use App\Models\RequestStatusHistory;

class ConfirmedToCreated implements RequestTransition
{
    public static function execute(Request $request): Request
    {
        throw_unless($request->isConfirmed(), new CannotChangeRequestStatusException());

        $previousStatus = $request->status;
        $request->status = RequestStatus::Created->value;
        $request->activated_at = null;
        $request->save();

        RequestStatusHistory::create([
            'request_id' => $request->id,
            'previous_status' => $previousStatus,
            'new_status' => $request->status,
            'changed_by_user_id' => auth()->user()->id,
        ]);

        return $request->refresh();
    }
}
