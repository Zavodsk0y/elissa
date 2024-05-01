<?php

namespace App\Enums\Request;

use App\Models\Request;
use App\Transitions\Request\ConfirmedToCreated;
use App\Transitions\Request\ConfirmedToDone;
use App\Transitions\Request\CreatedToConfirmed;

enum RequestStatus: string
{
    case Created = 'Добавлена';
    case Confirmed = 'Подтверждена';
    case Done = 'Исполнена';

    public function updateStatus(Request $request): Request
    {
        return match ($this) {
            RequestStatus::Created => ConfirmedToCreated::execute($request),
            RequestStatus::Confirmed => CreatedToConfirmed::execute($request),
            RequestStatus::Done => ConfirmedToDone::execute($request)
        };
    }
}


