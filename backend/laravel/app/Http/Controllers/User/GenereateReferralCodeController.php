<?php

namespace App\Http\Controllers\User;

use App\Actions\User\GenerateReferralCodeAction;
use App\Http\Controllers\Controller;
use App\Models\ReferralCode;
use App\Models\User;

class GenereateReferralCodeController extends Controller
{
    public function __invoke(): ReferralCode
    {
        return GenerateReferralCodeAction::execute(auth()->user());
    }
}
