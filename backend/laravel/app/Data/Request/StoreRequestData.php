<?php

namespace App\Data\Request;

use App\Enums\Request\RequestStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Prohibited;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Symfony\Contracts\Service\Attribute\Required;

#[MapName(SnakeCaseMapper::class)]
class StoreRequestData extends Data
{
    public function __construct(
        public readonly int    $userId,
        #[Required, Exists('services', 'id')]
        public readonly int     $serviceId,
        #[Required, Regex('/^\+7\d{10}$/')]
        public readonly string  $phone,
        #[WithCast(EnumCast::class)]
        #[Prohibited]
        public readonly string $status = RequestStatus::Created->value
    )
    {
    }

    public static function fromRequest(Request $request, User $user): self
    {
        $userId = $user->id;

        return new self(
            $userId,
            $request->service_id,
            $request->phone,
            RequestStatus::Created->value
        );
    }
}
