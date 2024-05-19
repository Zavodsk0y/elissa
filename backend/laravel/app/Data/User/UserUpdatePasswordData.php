<?php

namespace App\Data\User;

use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Data;

class UserUpdatePasswordData extends Data
{
    public function __construct(
        #[Password(min: 12, letters: true, mixedCase: true, numbers: false, symbols: false)]
        public string $password
    ) {}

    public static function attributes(...$args): array
    {
        return [
            'password' => 'пароль'
        ];
    }
}
