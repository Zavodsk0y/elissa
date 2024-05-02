<?php

namespace App\Exceptions\Shared;

use App\Exceptions\Shared\ApiException;

class UnauthorizedException extends ApiException
{
    public function __construct($code = 403, $message = 'У вас недостаточно прав для совершения этого действия. Возможно, у вас не подтверждена почта.')
    {
        parent::__construct($code, $message);
    }
}
