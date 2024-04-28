<?php

namespace App\Http\Controllers\User;

use App\Actions\User\EnterReferralCodeAction;
use App\Data\User\ReferralCodeData;
use App\Http\Controllers\Controller;

class EnterReferralCodeController extends Controller
{
    public function __invoke(ReferralCodeData $data)
    {
        return EnterReferralCodeAction::execute($data, auth()->user());
    }
}
