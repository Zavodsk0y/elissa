<?php

namespace App\Actions\User;

use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class RedirectToVkAction
{
    public static function execute(): RedirectResponse
    {
        return Socialite::driver('vkontakte')
            ->stateless()
            ->redirect();
    }
}
