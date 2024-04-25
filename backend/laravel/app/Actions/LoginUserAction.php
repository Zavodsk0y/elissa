<?php

namespace app\Actions;

use app\Data\User\UserLoginData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginUserAction
{
    public static function execute(UserLoginData $data)
    {
        $user = User::where('login', $data->login)->first();

        throw_unless($user && Hash::check($data->password, $user->password), LoginFailed());
        // TODO: LoginFailedException

        $token = $user->createToken('auth');
        return ['user' => $user, 'token' => $token->plainTextToken];
    }
}
