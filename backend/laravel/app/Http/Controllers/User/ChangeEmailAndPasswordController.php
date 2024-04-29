<?php

namespace App\Http\Controllers\User;

use App\Actions\User\ChangeEmailAndPasswordAction;
use App\Data\User\UserChangeEmailAndPasswordData;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ChangeEmailAndPasswordController extends Controller
{
    public function __invoke(UserChangeEmailAndPasswordData $data): JsonResponse
    {
        return ChangeEmailAndPasswordAction::execute(auth()->user(), $data);
    }
}
