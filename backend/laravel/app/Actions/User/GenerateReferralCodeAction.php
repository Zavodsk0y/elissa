<?php

namespace App\Actions\User;

use App\Exceptions\User\UserAlreadyHasCodeException;
use App\Models\ReferralCode;
use App\Models\User;
use Illuminate\Support\Str;

class GenerateReferralCodeAction
{
    public static function execute(User $user): ReferralCode
    {
        throw_unless(!$user->referralCode, UserAlreadyHasCodeException::class);

        return ReferralCode::create([
            'user_id' => $user->id,
            'referral_code' => Str::random(20)
        ]);
    }
}
