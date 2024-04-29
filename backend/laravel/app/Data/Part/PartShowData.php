<?php

namespace App\Data\Part;

use App\Data\Category\CategoryData;
use App\Models\Part;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class PartShowData extends Data
{
    public function __construct(
        public readonly int          $id,
        public readonly string       $header,
        public readonly string       $description,
        public readonly float        $price,
        public readonly CategoryData $category
    )
    {
    }

    public static function fromModel(Part $part): PartShowData
    {
        return new self(
            $part->id,
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
