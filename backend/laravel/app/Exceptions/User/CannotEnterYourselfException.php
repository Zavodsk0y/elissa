<?php

namespace App\Exceptions\User;

use App\Exceptions\Shared\ApiException;

class CannotEnterYourselfException extends ApiException
{
    public function __construct($code = 422, $message = 'Вы не можете назначить себе свой реферальный код или использовать его повторно.')
    {
        parent::__construct($code, $message);
    }
}
