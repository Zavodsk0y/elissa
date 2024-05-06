<?php

namespace App\Data\Part;

use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Image;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UpdatePartData extends Data
{
    public function __construct(
        #[IntegerType, Exists('repair_parts', 'id')]
        public readonly ?int          $id,
        #[IntegerType, Exists('parts_categories', 'id')]
        public readonly ?int          $categoryId,
        #[StringType, Max(255)]
        public readonly ?string       $header,
        #[StringType, Max(500)]
        public readonly ?string       $description,
        public readonly ?float        $price,
        #[Image, Between(0, 4096)]
        public readonly ?UploadedFile $image
    )
    {
    }

    public static function fromRequest(Request $request, Part $part): self
    {
        return self::from([
            'id' => $request->id,
            'categoryId' => $request->input('category_id') ?? $part->category_id,
            'header' => $request->input('header') ?? $part->header,
            'description' => $request->input('description') ?? $part->description,
            'price' => $request->input('price') ?? $part->price,
            'image' => $request->file('image')
        ]);
    }

    public static function attributes(...$args): array
    {
        return [
            'id' => 'идентификатор запчасти',
            'categoryId' => 'идентификатор категории',
            'header' => 'наименование',
            'description' => 'описание',
            'price' => 'цена',
            'image' => 'изображение'
        ];
    }
}

