<?php

namespace App\Data\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;

class UpdateCategoryData extends Data
{
    public function __construct(
        #[IntegerType, Exists('parts_categories', 'id')]
        public readonly ?int $id,
        #[Unique('parts_categories')]
        public string        $name
    )
    {
    }

    public static function fromRequest(Request $request, Category $category): self
    {
        return self::from([
            'id' => $request->id,
            'name' => $request->input('name') ?? $category->name,
        ]);
    }

    public static function attributes(...$args): array
    {
        return [
            'id' => 'идентификатор категории',
            'name' => 'название категории'
        ];
    }
}
