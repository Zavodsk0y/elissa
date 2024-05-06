<?php

namespace App\Data\News;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Attributes\Validation\Image;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Size;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class StoreNewsData extends Data
{
    public function __construct(
        #[Required, StringType, Max(255)]
        public readonly string       $title,
        #[Required, StringType, Max(1000)]
        public readonly string       $text,
        #[Required, Image, Between(0, 4096)]
        public readonly UploadedFile $image
    )
    {
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            ...$request->all(),
        ]);
    }

    public static function attributes(...$args): array
    {
        return [
            'title' => 'заголовок',
            'text' => 'текст',
            'image' => 'изображение'
        ];
    }
}
