<?php

namespace App\Exceptions\Shared;

use App\Exceptions\Shared\ApiException;

class ValidationFailedException extends ApiException
{
    public function __construct($code = 422, $message = 'Ошибка валидации', $errors = [])
    {
        parent::__construct($code, $message, $errors);
    }
}
