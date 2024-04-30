<?php

namespace App\Data\Order;

use App\Enums\Order\OrderStatus;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Prohibited;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class StoreOrderData extends Data
{
    public function __construct(
        public readonly ?int $userId,
        public readonly float $totalAmount,
        #[WithCast(EnumCast::class)]
        #[Prohibited]
        public readonly ?string $status = OrderStatus::Created->value
    ) {}

    public static function fromRequest(User $user): self
    {
        return new self(
            $user->id,
            CartItem::where('user_id', $user->id)->get()->sum(function ($item) {
                return $item->quantity * $item->part->price;
            }),
            OrderStatus::Created->value
        );
    }
}