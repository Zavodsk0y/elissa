<?php

namespace app\Transitions\Request;

use app\Enums\Request\RequestStatus;
use App\Models\Request;

class ConfirmedToDone implements RequestTransition
{
    public static function execute(Request $request): Request
    {
        throw_unless($request->isConfirmed(), new CannotChangeRequestStatusException());
        $request->status = RequestStatus::Done->value;
        $request->updated_at = now();
        $request->save();

        return $request->refresh();
    }
}
