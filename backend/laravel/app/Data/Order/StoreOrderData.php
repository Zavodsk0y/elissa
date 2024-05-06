<?php

namespace App\Data\Order;

use App\Enums\Order\OrderStatus;
use App\Models\CartItem;
use App\Models\Referral;
use App\Models\User;
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
        public readonly ?int    $userId,
        public readonly float   $totalAmount,
        public readonly ?float  $referralAmount,
        #[WithCast(EnumCast::class)]
        #[Prohibited]
        public readonly ?string $status = OrderStatus::Created->value
    )
    {
    }

    public static function fromRequest(User $user): self
    {
        $totalAmount = CartItem::where('user_id', $user->id)->get()->sum(function ($item) {
            return $item->quantity * $item->part->price;
        });
        $referral = Referral::where('referred_user_id', $user->id)->first();
        if ($referral) $referralAmount = $totalAmount * 0.95;
        else $referralAmount = null;

        return new self(
            $user->id,
            $totalAmount,
            $referralAmount,
            OrderStatus::Created->value
        );
    }

    public static function attributes(...$args): array
    {
        return [
            'userId' => 'идентификатор пользователя',
            'totalAmount' => 'общая цена заказа',
            'referralAmount' => 'реферальная цена заказа',
            'status' => 'статус заказа'
        ];
    }
}
