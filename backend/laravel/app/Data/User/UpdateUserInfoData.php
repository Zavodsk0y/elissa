<?php

namespace App\Data\User;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;

class UpdateUserInfoData extends Data
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $surname,
        public readonly ?string $patronymic

    )
    {
    }

    public static function fromRequest(Request $request, User $user): self
    {
        return self::from([
            'name' => $request->input('name', $user->name),
            'surname' => $request->input('surname', $user->surname),
            'patronymic' => $request->input('patronymic', $user->patronymic)
        ]);
    }

    public static function attributes(...$args): array
    {
        return [
            'name' => 'имя',
            'surname' => 'фамилия',
            'patronymic' => 'отчество'
        ];
    }
}

