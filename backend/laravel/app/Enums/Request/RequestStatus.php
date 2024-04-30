<?php

namespace App\Enums\Request;

use App\Models\Request;
use app\Transitions\Request\ConfirmedToDone;
use app\Transitions\Request\CreatedToConfirmed;

enum RequestStatus: string
{
    case Created = 'Добавлена';
    case Confirmed = 'Подтверждена';
    case Done = 'Исполнена';

    public function updateStatus(Request $request): Request
    {
        return match ($this) {
            RequestStatus::Confirmed => CreatedToConfirmed::execute($request),
            RequestStatus::Done => ConfirmedToDone::execute($request)
        };
    }
}


