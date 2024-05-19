<?php

namespace App\Data\Service;

use App\Models\Service;
use Spatie\LaravelData\Data;

class ServiceShowData extends Data
{
    public function __construct(
        public readonly int    $id,
        public readonly string $header,
        public readonly string $description,
        public readonly float  $price,
        public readonly string $url
    )
    {
    }

    public static function fromModel(Service $service): ServiceShowData
    {
        return new self(
            $service->id,
            $service->header,
            $service->description,
            $service->price,
            asset('/storage/' . $service->image_path)
        );
    }

    public static function attributes(...$args): array
    {
        return [
            'id' => 'идентификатор',
            'header' => 'название услуги',
            'description' => 'описание услуги',
            'price' => 'цена',
            'url' => 'путь к изображению'
        ];
    }

}