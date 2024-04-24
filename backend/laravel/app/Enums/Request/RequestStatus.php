<?php

namespace app\Enums\Request;

enum RequestStatus: string
{
    case Created = 'Добавлена';
    case Confirmed = 'Подтверждена';
    case Done = 'Исполнена';
}


