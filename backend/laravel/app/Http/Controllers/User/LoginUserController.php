<?php

namespace app\Http\Controllers\User;

use app\Actions\LoginUserAction;
use app\Data\User\UserLoginData;
use App\Http\Controllers\Controller;

class LoginUserController extends Controller
{
    public function __invoke(UserLoginData $data)
    {
        return LoginUserAction::execute($data);
    }
}
