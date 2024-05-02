<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify(Request $request, User $user): JsonResponse
    {
        $user->markEmailAsVerified();
        $user->assignRole('authenticated user');

        return response()->json(['message' => 'Email verified successfully.'], 200);
    }
}

