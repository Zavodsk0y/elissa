<?php

namespace app\Data\Request;

use app\Enums\Request\RequestStatus;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;

class RequestStatusData extends Data
{
    // TODO: ValidationError

    public function __construct(
        #[WithCast(EnumCast::class)]
        #[Required]
        public readonly RequestStatus $status,
    )
    {
    }
}
