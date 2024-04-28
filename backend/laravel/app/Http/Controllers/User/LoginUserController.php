<?php

namespace App\Http\Controllers\User;

use App\Actions\User\LoginUserAction;
use App\Data\User\UserLoginData;
use App\Http\Controllers\Controller;

class LoginUserController extends Controller
{
    public function __invoke(UserLoginData $data): array
    {
        return LoginUserAction::execute($data);
    }
}
