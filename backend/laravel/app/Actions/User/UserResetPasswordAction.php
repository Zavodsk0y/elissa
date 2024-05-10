<?php

namespace App\Actions\User;

use App\Data\User\UserResetPasswordData;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserResetPasswordAction
{
    public static function execute(UserResetPasswordData $data): void
    {
        $email = Crypt::decryptString($data->emailHash);
        $password = Crypt::decryptString($data->passwordHash);

        $user = User::where('email', $email)->firstOrFail();

        $user->update([
            'password' => Hash::make($password),
        ]);
    }
}
