<?php

namespace App\Data\User;

use Spatie\LaravelData\Data;

class UserLoginData extends Data
{
    public function __construct(
        public string $login,
        public string $password
    )
    {
    }

    public static function attributes(...$args): array
    {
        return [
            'login' => 'логин',
            'password' => 'пароль'
        ];
    }
}
