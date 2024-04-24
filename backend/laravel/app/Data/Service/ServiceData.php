<?php

namespace app\Data\Service;

use Spatie\LaravelData\Data;

class ServiceData extends Data
{
    public function __construct(
        public string $header,
        public string $description,
        public float $price
    )
    {
    }

    public static function attributes(...$args): array
    {
        return [
            'header' => 'название услуги',
            'description' => 'описание услуги',
            'price' => 'цена'
        ];
    }

}
