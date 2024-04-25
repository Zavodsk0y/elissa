<?php

namespace app\Data\Part;

use app\Data\Category\CategoryData;
use App\Models\Part;
use Spatie\LaravelData\Data;

class PartShowData extends Data
{
    public function __construct(
        public readonly string $header,
        public readonly string $description,
        public readonly float $price,
        public readonly CategoryData $categoryData
    )
    {
    }

    public static function fromModel(Part $part): PartShowData
    {
        return new self(
            $part->header,
            $part->description,
            $part->price,
            CategoryData::from($part->category)
        );
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
