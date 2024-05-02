<?php

namespace App\Exceptions\Shared;

use App\Exceptions\Shared\ApiException;

class UnauthenticatedException extends ApiException
{
    public function __construct($code = 401, $message = 'Вы не авторизованы.')
    {
        parent::__construct($code, $message);
    }
}
