<?php

namespace app\Data\News;

use App\Models\News;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class NewsData extends Data
{
    public function __construct(
        #[Required, StringType]
        public string $title,
        #[Required, StringType, Max(1000)]
        public string $text
    )
    {
    }

    public static function fromModel(News $news): NewsData
    {
        return new self(
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
