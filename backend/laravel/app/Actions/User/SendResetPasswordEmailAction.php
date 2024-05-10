<?php

namespace App\Actions\User;

use App\Data\User\UserEmailData;
use App\Exceptions\User\EmailIsNotVerifiedException;
use App\Models\User;
use App\Notifications\User\ResetPasswordNotification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class SendResetPasswordEmailAction
{
    public static function execute(UserEmailData $data): void
    {
        $user = User::where('email', $data->email)->firstOrFail();

        throw_if($user->email_verified_at === null, new EmailIsNotVerifiedException());

        $password = Str::random(12);
        $encryptPassword = Crypt::encryptString($password);
        $encryptEmail = Crypt::encryptString($data->email);

        $url = URL::temporarySignedRoute('reset-password', now()->addHour(), [
            'email_hash' => $encryptEmail,
            'password_hash' => $encryptPassword
        ]);

        $user->notify(new ResetPasswordNotification($url, $password));
    }
}
