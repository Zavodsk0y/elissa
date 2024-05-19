<?php

namespace App\Actions\User;

use App\Exceptions\User\EmailAlreadyVerifiedException;
use App\Models\User;
use App\Notifications\User\EmailVerificationNotification;
use Illuminate\Support\Facades\URL;

class ResendEmailAction
{
    public static function execute(User $user): void
    {
        throw_if($user->email_verified_at, new EmailAlreadyVerifiedException());

        $signedRoute = URL::temporarySignedRoute('verification.verify', now()->addDay(), ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification()), 'user' => $user]);

        $user->notify(new EmailVerificationNotification($signedRoute));
    }
}
