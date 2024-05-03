<?php

namespace App\Data\News;

use App\Models\News;
use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class NewsData extends Data
{
    public function __construct(
        public readonly ?int $id,
        #[Required, StringType, Max(255)]
        public ?string       $title,
        #[Required, StringType, Max(1000)]
        public ?string       $text,
        public ?string       $url
    )
    {
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            ...$request->all(),
        ]);
    }

    public static function fromModel(News $news): NewsData
    {
        return new self(
            $news->id,
            $news->title,
            $news->text,
            asset('/storage/' . $news->image_path)
        );
    }

    public static function attributes(...$args): array
    {
        return [
            'id' => 'идентификатор новости',
            'title' => 'заголовок',
            'text' => 'текст',
            'url' => 'путь к изображению'
        ];
    }
}
