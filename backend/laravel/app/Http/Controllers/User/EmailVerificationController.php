<?php

namespace App\Http\Controllers\User;

use App\Actions\User\ResendEmailAction;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class EmailVerificationController extends Controller
{
    public function verify(User $user): Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
    {
        $user->markEmailAsVerified();
        $user->assignRole('authenticated user');

        return redirect(env('APP_URL', 'http://localhost') . '/email-verified');
    }

    public function resendEmail(): JsonResponse
    {
        ResendEmailAction::execute(auth()->user());

        return response()->json([], 250);
    }
}

