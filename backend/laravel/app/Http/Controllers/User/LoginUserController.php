<?php

namespace app\Http\Controllers\User;

use app\Actions\User\LoginUserAction;
use app\Data\User\UserLoginData;
use App\Http\Controllers\Controller;

class LoginUserController extends Controller
{
    public function __invoke(UserLoginData $data): array
    {
        return LoginUserAction::execute($data);
    }
}
