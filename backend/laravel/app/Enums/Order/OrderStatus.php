<?php

namespace App\Enums\Order;

use App\Models\Order;
use App\Transitions\Order\ConfirmedToCreated;
use App\Transitions\Order\ConfirmedToDone;
use App\Transitions\Order\CreatedToConfirmed;


enum OrderStatus: string
{
    case Created = 'Добавлен';
    case Confirmed = 'Подтвержден';
    case Done = 'Готов';

    public function updateStatus(Order $order): Order
    {
        return match ($this) {
            OrderStatus::Created => ConfirmedToCreated::execute($order),
            OrderStatus::Confirmed => CreatedToConfirmed::execute($order),
            OrderStatus::Done => ConfirmedToDone::execute($order)
        };
    }
}
