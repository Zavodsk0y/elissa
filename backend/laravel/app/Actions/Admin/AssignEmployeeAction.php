<?php

namespace App\Actions\Admin;

use App\Data\User\UserData;
use App\Models\User;

class AssignEmployeeAction
{
    public static function execute(User $user): UserData
    {
        $user->markEmailAsVerified();
        $user->syncRoles(['authenticated user', 'employee']);

        return UserData::fromModel($user);
    }
}
