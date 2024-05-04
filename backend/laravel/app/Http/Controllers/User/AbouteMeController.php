<?php

namespace App\Http\Controllers\User;

use App\Data\User\UserData;
use App\Http\Controllers\Controller;

class AbouteMeController extends Controller
{
    public function __invoke()
    {
        return UserData::fromModel(auth()->user());
    }
}
