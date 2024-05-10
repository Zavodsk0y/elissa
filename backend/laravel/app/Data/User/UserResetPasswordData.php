<?php

namespace App\Data\User;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UserResetPasswordData extends Data
{
    public function __construct(
        public readonly string $emailHash,
        public readonly string $passwordHash,
    ) {
    }

    public function fromRequest(Request $request): self
    {
        return self::from([
            'emailHash' => $request->input('email_hash'),
            'passwordHash' => $request->input('password_hash'),
        ]);
    }

    public static function attributes(...$args): array
    {
        return [
            '$emailHash' => 'адрес электронной почты',
            '$passwordHash' => 'пароль',
        ];
    }
}
