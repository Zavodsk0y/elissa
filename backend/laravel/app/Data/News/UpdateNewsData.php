<?php

namespace App\Data\News;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Image;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Size;
use Spatie\LaravelData\Data;

class UpdateNewsData extends Data
{
    public function __construct(
        #[IntegerType, Exists('news', 'id')]
        public readonly ?int          $id,
        public readonly ?string       $title,
        public readonly ?string       $text,
        #[Image, Between(0, 4096)]
        public readonly ?UploadedFile $image
    )
    {
    }

    public static function fromRequest(Request $request, News $news): self
    {
        return self::from([
            'id' => $request->id,
            'title' => $request->input('title', $news->title),
            'text' => $request->input('text', $news->text),
            'image' => $request->file('image')
        ]);
    }

    public static function attributes(...$args): array
    {
        return [
            'id' => 'идентификатор новости',
            'title' => 'заголовок',
            'text' => 'текст',
            'image' => 'изображение'
        ];
    }
}
