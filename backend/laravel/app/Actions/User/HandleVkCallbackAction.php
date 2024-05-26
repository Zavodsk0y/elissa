<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;

class HandleVkCallbackAction
{
    public static function execute()
    {
        $userSocial = Socialite::driver('vkontakte')->stateless()->user();

        $user = User::where('vk_id', $userSocial->getId())->first();

        if (!$user) {
            $user = User::create([
                'vk_id' => $userSocial->getId(),
                'login' => $userSocial->getNickname(),
                'name' => $userSocial->user['first_name'],
                'surname' => $userSocial->user['last_name'],
            ]);

            $token = $user->createToken('auth')->plainTextToken;

            return redirect()->away(env('APP_URL') . ':8081/callback?token=' . $token);
        }

        $token = $user->createToken('auth')->plainTextToken;

        return redirect()->away((env('APP_URL') . ':8081/callback?token=' . $token));
    }
}
