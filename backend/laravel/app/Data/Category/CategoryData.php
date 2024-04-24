<?php

namespace app\Data\Category;

use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        #[Unique('parts_categories, name')]
        public string $name
    )
    {
    }

    public static function attributes(...$args): array
    {
        return [
            'name' => 'название категории'
        ];
    }
}
