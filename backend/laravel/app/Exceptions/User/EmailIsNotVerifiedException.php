<?php

namespace App\Exceptions\User;

use App\Exceptions\Shared\ApiException;

class EmailIsNotVerifiedException extends ApiException
{
    public function __construct($code = 422, $message = 'Ваш email не подтвержден')
    {
        parent::__construct($code, $message);
    }
}
