<?php

namespace App\Actions\User;

use App\Data\User\UpdateUserInfoData;
use App\Data\User\UserData;
use App\Models\User;

class UpdateUserInfoAction
{
    public static function execute(User $user, UpdateUserInfoData $data): UserData
    {
        $user->update([
            ...$data->all()
        ]);

        return UserData::fromModel($user);
    }
}
