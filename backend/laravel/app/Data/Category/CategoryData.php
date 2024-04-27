<?php

namespace App\Data\Category;

use App\Models\Category;
use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        public readonly ?int   $id,
        public readonly string $name
    )
    {
    }

    public static function fromModel(Category $category): self
    {
        return new self(
            $category->id,
            $category->name
        );
    }

    public static function attributes(...$args): array
    {
        return [
            'name' => 'название категории'
        ];
    }
}
