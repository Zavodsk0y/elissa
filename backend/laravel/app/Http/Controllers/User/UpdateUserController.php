<?php

namespace App\Http\Controllers\User;

use App\Actions\User\UpdateUserEmailAction;
use App\Actions\User\UpdateUserInfoAction;
use App\Actions\User\UpdateUserPasswordAction;
use App\Data\User\UpdateUserInfoData;
use App\Data\User\UserData;
use App\Data\User\UserEmailData;
use App\Data\User\UserUpdatePasswordData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    public function updateEmail(UserEmailData $data): UserData
    {
        return UpdateUserEmailAction::execute(auth()->user(), $data);
    }

    public function updateInfo(Request $request): UserData
    {
        $data = UpdateUserInfoData::fromRequest($request, auth()->user());

        return UpdateUserInfoAction::execute(auth()->user(), $data);
    }

    public function updatePassword(UserUpdatePasswordData $data): UserData
    {
        return UpdateUserPasswordAction::execute($data, auth()->user());
    }
}
