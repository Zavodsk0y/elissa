<?php

namespace App\Data\Order;

use App\Models\Order;
use Spatie\LaravelData\Data;

class OrderData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $status,
        public readonly float $totalAmount,
        public readonly array $items,
    ) {}

    public static function fromModel(Order $order): self
    {
        return new self(
            $order->id,
            $order->status,
            $order->total_amount,
            $order->items->map(function ($item) {
                return [
                    'id' => $item->id,
                    'part_name' => $item->part->header,
                    'quantity' => $item->quantity,
                    'price_per_unit' => $item->part->price,
                    'total_price' => $item->quantity * $item->part->price,
                ];
            })->toArray(),
        );
    }
}
