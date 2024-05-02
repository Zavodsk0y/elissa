<?php

namespace App\Data\User;

use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Attributes\WithoutValidation;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class UserRegistrationData extends Data
{
    public function __construct(
        #[Unique('users', 'login'), Min(6)]
        public string $login,
        #[Unique('users', 'email'), Email]
        public string $email,
        public string $name,
        public string $surname,
        #[WithoutValidation]
        public string $patronymic,
        #[Password(min: 12, letters: true, mixedCase: true, numbers: false, symbols: false)]
        public string $password,
    )
    {
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            ...$request->all(),
        ]);
    }

    public static function attributes(...$args): array
    {
        return [
            'login' => 'логин',
            'email' => 'адрес электронной почты',
            'name' => 'имя',
            'surname' => 'фамилия',
            'patronymic' => 'отчество',
            'password' => 'пароль'
        ];
    }
}
