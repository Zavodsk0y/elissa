<?php

namespace App\Exceptions\User;

use App\Exceptions\Shared\ApiException;

class UserAlreadyHasCodeException extends ApiException
{
    public function __construct($code = 422, $message = 'У вас уже существует реферальный код.')
    {
        parent::__construct($code, $message);
    }
}
