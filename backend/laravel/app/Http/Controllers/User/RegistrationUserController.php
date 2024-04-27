<?php

namespace App\Http\Controllers\User;

use App\Actions\User\RegistrationUserAction;
use App\Data\User\UserRegistrationData;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class RegistrationUserController extends Controller
{
    public function __invoke(UserRegistrationData $data): User
    {
        return RegistrationUserAction::execute($data);
    }
}
