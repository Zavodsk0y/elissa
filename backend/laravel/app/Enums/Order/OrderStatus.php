<?php

namespace App\Enums\Order;

use App\Models\Order;

enum OrderStatus: string
{
    case Created = 'Добавлен';
    case Confirmed = 'Подтвержден';
    case Done = 'Готов';

    public function updateStatus(Order $order)
    {

    }
}
