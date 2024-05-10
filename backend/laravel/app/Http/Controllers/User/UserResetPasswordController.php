<?php

namespace App\Http\Controllers\User;

use App\Actions\User\SendResetPasswordEmailAction;
use App\Actions\User\UserResetPasswordAction;
use App\Data\User\UserEmailData;
use App\Data\User\UserResetPasswordData;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UserResetPasswordController extends Controller
{
    public function sendEmail(UserEmailData $data): JsonResponse
    {
        SendResetPasswordEmailAction::execute($data);

        return response()->json();
    }

    public function resetPassword(UserResetPasswordData $data): JsonResponse
    {
        UserResetPasswordAction::execute($data);

        return response()->json();
    }
}
