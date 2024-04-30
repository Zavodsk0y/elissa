<?php

namespace App\Transitions\Order;

use App\Models\Order;

interface OrderTransition
{
    public static function execute(Order $order): Order;
}
