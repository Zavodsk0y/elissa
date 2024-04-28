<?php

namespace App\Actions\User;

use App\Data\User\UserLoginData;
use App\Exceptions\User\LoginFailed;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginUserAction
{
    public static function execute(UserLoginData $data): array
    {
        $user = User::where('login', $data->login)->first();

        throw_unless($user && Hash::check($data->password, $user->password), LoginFailed::class);

        $token = $user->createToken('auth');
        return ['user' => $user, 'token' => $token->plainTextToken];
    }
}
