<?php

namespace App\Data\User;

use App\Models\User;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UserData extends Data
{
    public function __construct(
        public int     $id,
        public ?string $vkId,
        public string  $login,
        public string  $email,
        public string  $name,
        public string  $surname,
        public ?string $patronymic,
        public ?Carbon $emailVerifiedAt,
        public Carbon  $createdAt,
        public Carbon  $updatedAt,
        public ?array   $roles
    )
    {
    }

    public static function fromModel(User $user): self
    {
        return new self(
            id: $user->id,
            vkId: $user->vk_id,
            login: $user->login,
            email: $user->email,
            name: $user->name,
            surname: $user->surname,
            patronymic: $user->patronymic,
            emailVerifiedAt: $user->email_verified_at ? new Carbon($user->email_verified_at) : null,
            createdAt: new Carbon($user->created_at),
            updatedAt: new Carbon($user->updated_at),
            roles: $user->getRoleNames()->toArray()
        );
    }

    public static function attributes(...$args): array
    {
        return [
            'id' => 'идентифкатор пользователя',
            'vkId' => 'идентификатор Вконтакте',
            'login' => 'логин',
            'email' => 'почта',
            'name' => 'имя',
            'surname' => 'фамилия',
            'patronymic' => 'отчество',
            'emailVerifiedAt' => 'подтверждение почты',
            'createdAt' => 'дата создания',
            'updatedAt' => 'дата обновления',
            'roles' => 'роли'
        ];
    }
}
