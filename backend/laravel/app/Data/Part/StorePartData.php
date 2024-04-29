<?php

namespace App\Data\Part;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Symfony\Contracts\Service\Attribute\Required;

#[MapName(SnakeCaseMapper::class)]
class StorePartData extends Data
{
    public function __construct(
        #[IntegerType, Exists('parts_categories', 'id'), Required]
        public int    $categoryId,
        #[StringType, Max(255), Required]
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
            'categoryId' => 'идентификатор категории',
            'header' => 'наименование',
            'description' => 'описание',
            'price' => 'цена'
        ];
    }
}
