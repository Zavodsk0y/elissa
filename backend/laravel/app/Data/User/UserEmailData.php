<?php

namespace App\Data\User;

use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class UserEmailData extends Data
{
    public function __construct(
        #[Required, Email]
        public readonly string $email,
    ) {
    }

    public function fromRequest(Request $request): self
    {
        return self::from([
            'email' => $request->input('email'),
        ]);
    }

    public static function attributes(...$args): array
    {
        return [
            'email' => 'адрес электронной почты',
        ];
    }
}
