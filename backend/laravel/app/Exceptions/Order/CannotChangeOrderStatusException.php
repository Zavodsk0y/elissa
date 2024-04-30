<?php

namespace App\Exceptions\Order;

use App\Exceptions\Shared\ApiException;

class CannotChangeOrderStatusException extends ApiException
{
    public function __construct($code = 422, $message = 'Вы не можете изменить статус заказа.')
    {
        parent::__construct($code, $message);
    }
}
