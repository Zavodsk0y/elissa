<?php

namespace App\Actions\User;

use App\Data\User\UserData;
use App\Data\User\UserEmailData;
use App\Models\User;
use App\Notifications\User\EmailVerificationNotification;
use Illuminate\Support\Facades\URL;

class UpdateUserEmailAction
{
    public static function execute(User $user, UserEmailData $data)
    {
        $user->update([
            ...$data->all(),
            'email_verified_at' => null
        ]);

        $signedRoute = URL::temporarySignedRoute('verification.verify', now()->addDay(), ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification()), 'user' => $user]);

        $user->notify(new EmailVerificationNotification($signedRoute));

        return UserData::fromModel($user);
    }
}
