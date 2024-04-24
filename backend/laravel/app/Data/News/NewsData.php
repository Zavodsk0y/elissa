<?php

namespace app\Data\News;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class NewsData extends Data
{
    public function __construct(
        public string $title,
        #[Required, StringType, Max(1000)]
        public string $text
    )
    {
    }

    public static function attributes(...$args): array
    {
        return [
            'title' => 'заголовок',
            'text' => 'текст'
        ];
    }
}
