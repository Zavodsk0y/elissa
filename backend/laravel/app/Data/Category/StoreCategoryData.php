<?php

namespace App\Data\Category;

use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;

class StoreCategoryData extends Data
{
    public function __construct(
        #[Unique('parts_categories', 'name')]
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
