<?php

namespace App\Http\Controllers\User;

use App\Actions\User\EnterReferralCodeAction;
use App\Data\User\ReferralCodeData;
use App\Http\Controllers\Controller;
use App\Models\Referral;

class EnterReferralCodeController extends Controller
{
    public function __invoke(ReferralCodeData $data): Referral
    {
        return EnterReferralCodeAction::execute($data, auth()->user());
    }
}
