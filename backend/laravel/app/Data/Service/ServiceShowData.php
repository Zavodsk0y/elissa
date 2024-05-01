<?php

namespace app\Data\Service;

use App\Models\Service;
use Spatie\LaravelData\Data;

class ServiceShowData extends Data
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
