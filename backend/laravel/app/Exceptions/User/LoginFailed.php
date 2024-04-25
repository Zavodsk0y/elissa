<?php

namespace app\Exceptions\User;

use app\Exceptions\Shared\ApiException;

class LoginFailed extends ApiException
{
    public function __construct($code = 422, $message = 'Неверный логин или пароль')
    {
        parent::__construct($code, $message);
    }
}
