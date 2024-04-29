<?php

namespace App\Data\User;

use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;

class UserChangeEmailAndPasswordData extends Data
{
    public function __construct(
        #[Unique('users')]
        public string $email,
        #[Password(min: 12, letters: true, mixedCase: true, numbers: false, symbols: false)]
        public string $password
    ) {}
}
