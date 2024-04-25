<?php

namespace app\Actions\User;

use App\Models\ReferralCode;
use App\Models\User;
use Illuminate\Support\Str;

class GenerateReferralCodeAction
{
    public static function execute(User $user): ReferralCode
    {
        return ReferralCode::create([
            'user_id' => $user->id,
            'referral_code' => Str::random(20)
        ]);
    }
}
