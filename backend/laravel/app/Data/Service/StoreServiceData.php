<?php

namespace App\Data\Service;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Symfony\Contracts\Service\Attribute\Required;

#[MapName(SnakeCaseMapper::class)]
class StoreServiceData extends Data
{
    public function __construct(
        #[StringType, Max(255), Required, Unique('services', 'header')]
        public string $header,
        #[StringType, Max(500), Required]
        public string $description,
        #[Required]
        public float  $price
    )
    {
    }

    public static function attributes(...$args): array
    {
        return [
            'header' => 'наименование услуги',
            'description' => 'описание',
            'price' => 'цена'
        ];
    }
}
