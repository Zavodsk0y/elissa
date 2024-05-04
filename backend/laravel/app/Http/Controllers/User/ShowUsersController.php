<?php

namespace App\Http\Controllers\User;

use App\Data\User\UserData;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShowUsersController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('view-users', User::class);

        return UserData::collect(User::all());
    }

    public function show(User $user): UserData
    {
        $this->authorize('view-users', User::class);

        return UserData::fromModel($user);
    }
}
