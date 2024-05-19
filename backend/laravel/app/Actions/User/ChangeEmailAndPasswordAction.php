<?php

namespace App\Actions\User;

use App\Data\User\UserChangeEmailAndPasswordData;
use App\Exceptions\User\NotVkUserException;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class ChangeEmailAndPasswordAction
{
    public static function execute(User $user, UserChangeEmailAndPasswordData $data): JsonResponse
    {
        throw_if($user->vk_id === null, new NotVkUserException());

        $user->update(
            $data->all(),
        );

        return response()->json(['message' => 'Данные успешно изменены', 'user' => $user]);
    }
}
