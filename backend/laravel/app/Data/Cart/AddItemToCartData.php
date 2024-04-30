<?php

namespace App\Data\Cart;

use App\Models\Part;
use App\Models\Request;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\GreaterThan;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Symfony\Contracts\Service\Attribute\Required;

#[MapName(SnakeCaseMapper::class)]
class AddItemToCartData extends Data
{
    public function __construct(
        #[IntegerType, Exists('repair_parts', 'id'), Required]
        public readonly ?int $partId,
        #[IntegerType, Required, GreaterThan(0)]
        public readonly int $quantity,
        public readonly ?int $userId
    ) {}

    public static function attributes(...$args): array
    {
        return [
            'partId' => 'идентификатор запчасти',
            'quantity' => 'количество',
            'userId' => 'идентификатор пользователя'
        ];
    }
}
