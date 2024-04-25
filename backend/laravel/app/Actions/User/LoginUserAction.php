<?php

namespace app\Actions\User;

use app\Data\User\UserLoginData;
use app\Exceptions\User\LoginFailed;
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
