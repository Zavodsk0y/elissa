<?php

namespace App\Exceptions\Order;

use App\Exceptions\Shared\ApiException;

class OrderAlreadyConfirmedOrDoneException extends ApiException
{
    public function __construct($code = 422, $message = 'Вы не можете удалить заказ, статус которого был переведен из "Добавлен".')
    {
        parent::__construct($code, $message);
    }
}
