<?php

namespace App\Actions\Admin;

use App\Data\User\UserData;
use App\Models\User;

class UnsignEmployeeAction
{
    public static function execute(User $user): UserData
    {
        $user->syncRoles(['authenticated user']);

        return UserData::fromModel($user);
    }
}
