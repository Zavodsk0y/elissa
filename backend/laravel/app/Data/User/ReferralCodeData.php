<?php

namespace App\Data\User;

use App\Models\User;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ReferralCodeData extends Data
{
    public function __construct(
        #[Required, Exists('referral_codes')]
        public string $referralCode
    )
    {
    }
}
