<?php

namespace App\Http\Controllers\User;

use App\Actions\User\HandleVkCallbackAction;
use App\Actions\User\RedirectToVkAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class VkontakteAuthenticationController extends Controller
{
    public function redirectToVk(): RedirectResponse
    {
        return RedirectToVkAction::execute();
    }

    public function handleVkCallback()
    {
        return HandleVkCallbackAction::execute();
    }
}
