<?php

namespace app\Data\Request;

use app\Enums\Request\RequestStatus;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class RequestStatusData extends Data
{
    public function __construct(
        #[WithCast(EnumCast::class)]
        #[Required]
        public readonly RequestStatus $status,
    )
    {
    }
}
