<?php

namespace App\Exceptions\Request;

use App\Exceptions\Shared\ApiException;

class CannotChangeRequestStatusException extends ApiException
{
    public function __construct($code = 422, $message = 'Вы не можете изменить статус заявки.')
    {
        parent::__construct($code, $message);
    }
}
