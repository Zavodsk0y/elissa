<?php

namespace App\Data\Order;

use App\Enums\Order\OrderStatus;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class OrderStatusData extends Data
{
    public function __construct(
        #[WithCast(EnumCast::class)]
        #[Required]
        public readonly OrderStatus $status
    ) {}
}
