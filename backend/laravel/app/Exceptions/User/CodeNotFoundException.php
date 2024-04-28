<?php

namespace App\Exceptions\User;

use App\Exceptions\Shared\ApiException;

class CodeNotFoundException extends ApiException
{
    public function __construct($code = 404, $message = 'Реферальный код не найден.')
    {
        parent::__construct($code, $message);
    }
}
