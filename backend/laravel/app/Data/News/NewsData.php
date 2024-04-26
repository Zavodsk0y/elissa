<?php

namespace App\Data\News;

use App\Models\News;
use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class NewsData extends Data
{
    public function __construct(
        #[IntegerType, Exists('news', 'id')]
        public readonly ?int            $id,
        #[Required, StringType]
        public string $title,
        #[Required, StringType, Max(1000)]
        public string $text
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
            $news->text
        );
    }

    public static function attributes(...$args): array
    {
        return [
            'title' => 'заголовок',
            'text' => 'текст'
        ];
    }
}
