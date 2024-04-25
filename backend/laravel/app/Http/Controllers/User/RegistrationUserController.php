<?php

namespace app\Http\Controllers\User;

use app\Actions\RegistrationUserAction;
use app\Data\User\UserRegistrationData;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegistrationUserController extends Controller
{
    public function __invoke(UserRegistrationData $data): User
    {
        return RegistrationUserAction::execute($data);
    }
}
