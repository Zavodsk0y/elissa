<?php

namespace app\Actions\User;

use app\Data\User\UserRegistrationData;
use App\Models\User;
use Illuminate\Support\Facades\URL;

class RegistrationUserAction
{
    public static function execute(UserRegistrationData $data): User
    {
        $hashPassword = $data->password;

        $user = User::create([
            ...$data->all(),
            'password' => $hashPassword
        ]);

        $signedRoute = URL::temporarySignedRoute('verification.verify', now()->addDay(), ['user' => $user->id]);

        $urlBackParam = parse_url($signedRoute);
        $verifyLink = URL::format(request()->getSchemeAndHttpHost(), "email-verify/?path=$urlBackParam[path]&$urlBackParam[query]");

//       TODO: $user->notify(new EmailVerificationNotification($verifyLink));

        return $user;
    }
}
