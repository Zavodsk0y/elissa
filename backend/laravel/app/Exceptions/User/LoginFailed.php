<?php

namespace App\Exceptions\User;

use App\Exceptions\Shared\ApiException;

class LoginFailed extends ApiException
{
    public function __construct($code = 422, $message = 'Неверный логин или пароль')
    {
        parent::__construct($code, $message);
    }
}
