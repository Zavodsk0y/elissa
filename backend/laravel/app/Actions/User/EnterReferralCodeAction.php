<?php

namespace App\Actions\User;

use App\Data\User\ReferralCodeData;
use App\Exceptions\User\CannotEnterYourselfException;
use App\Exceptions\User\CodeNotFoundException;
use App\Models\Referral;
use App\Models\ReferralCode;
use App\Models\User;

class EnterReferralCodeAction
{
    public static function execute(ReferralCodeData $data, User $user)
    {
        $referringUser = ReferralCode::where('referral_code', $data->all())->first();

        throw_unless($referringUser, CodeNotFoundException::class);

        throw_unless($referringUser->user_id !== $user->id && !Referral::where('referred_user_id', $user->id)->first(),
            CannotEnterYourselfException::class);

        return Referral::create([
            'referring_user_id' => $referringUser->user_id,
            'referred_user_id' => $user->id
        ]);
    }
}
