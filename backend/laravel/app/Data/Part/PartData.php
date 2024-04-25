<?php

namespace app\Data\Part;

use App\Models\Part;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class PartData extends Data
{
    public function __construct(
        #[IntegerType, Exists('categories', 'id')]
        public int $categoryId,
        public string $header,
        #[StringType, Max(1000)]
        public string $description,
        public float $price
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
