<?php

namespace App\Data\Service;

use App\Models\Service;
use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UpdateServiceData extends Data
{
    public function __construct(
        #[IntegerType, Exists('services', 'id')]
        public readonly ?int    $id,
        #[StringType, Max(255)]
        public readonly ?string $header,
        #[StringType, Max(500)]
        public readonly ?string $description,
        public readonly ?float  $price
    )
    {
    }

    public static function fromRequest(Request $request, Service $service): self
    {
        return self::from([
            'id' => $request->id,
            'header' => $request->input('header') ?? $service->header,
            'description' => $request->input('description') ?? $service->description,
            'price' => $request->input('price') ?? $service->price
        ]);
    }
}

