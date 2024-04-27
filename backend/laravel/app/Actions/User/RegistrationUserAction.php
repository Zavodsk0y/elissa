<?php

namespace App\Actions\User;

use App\Data\User\UserRegistrationData;
use App\Models\User;
use App\Notifications\User\EmailVerificationNotification;
use Illuminate\Support\Facades\Log;
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

        $signedRoute = URL::temporarySignedRoute('verification.verify', now()->addDay(), ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]);

        $user->notify(new EmailVerificationNotification($signedRoute));

        return $user;
    }
}
