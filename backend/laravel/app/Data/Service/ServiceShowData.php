<?php

namespace App\Data\Service;

use App\Models\Service;
use Spatie\LaravelData\Data;

class ServiceShowData extends Data
{
    public function __construct(
        public int $id,
        public string $header,
        public string $description,
        public float $price
    )
    {
    }

    public static function attributes(...$args): array
    {
        return [
            'id' => 'идентификатор',
            'header' => 'название услуги',
            'description' => 'описание услуги',
            'price' => 'цена'
        ];
    }

}
