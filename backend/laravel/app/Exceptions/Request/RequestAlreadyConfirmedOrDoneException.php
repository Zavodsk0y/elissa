<?php

namespace App\Exceptions\Request;

use App\Exceptions\Shared\ApiException;

class RequestAlreadyConfirmedOrDoneException extends ApiException
{
    public function __construct($code = 422, $message = 'Вы не можете удалить заявку, статус которой был переведен из "Добавлена".')
    {
        parent::__construct($code, $message);
    }
}
