<?php

namespace app\Transitions\Request;

use app\Enums\Request\RequestStatus;

class CreatedToConfirmed implements RequestTransition
{
    public static function execute(Request $request): Request
    {
        throw_unless($request->isCreated(), new CannotChangeRequestStatusException());
        $request->status = RequestStatus::Confirmed->value;
        $request->activated_at = now();
        $request->save();
        // TODO: Implement execute() method.
    }
}
