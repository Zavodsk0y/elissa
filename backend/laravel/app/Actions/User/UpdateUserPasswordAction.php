<?php

namespace App\Actions\User;

use App\Data\User\UserData;
use App\Data\User\UserUpdatePasswordData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserPasswordAction
{
    public static function execute(UserUpdatePasswordData $data, User $user): UserData
    {
        $user->update([
            'password' => Hash::make($data->password)
        ]);

        return UserData::fromModel($user);
    }
}
