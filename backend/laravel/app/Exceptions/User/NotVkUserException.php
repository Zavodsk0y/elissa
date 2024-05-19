<?php

namespace App\Exceptions\User;

use App\Exceptions\Shared\ApiException;

class NotVkUserException extends ApiException
{
    public function __construct($code = 422, $message = 'Вы не были зарегистрированы через "Вконтакте"')
    {
        parent::__construct($code, $message);
    }
}
