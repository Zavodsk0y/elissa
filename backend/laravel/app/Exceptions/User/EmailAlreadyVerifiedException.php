<?php

namespace App\Exceptions\User;

use App\Exceptions\Shared\ApiException;

class EmailAlreadyVerifiedException extends ApiException
{
    public function __construct($code = 422, $message = 'Email уже подтвержден.')
    {
        parent::__construct($code, $message);
    }
}
