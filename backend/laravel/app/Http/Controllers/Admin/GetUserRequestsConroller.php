<?php

namespace App\Http\Controllers\Admin;

use App\Data\Request\RequestData;
use App\Http\Controllers\Controller;
use App\Models\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GetUserRequestsConroller extends Controller
{
    use AuthorizesRequests;

    public function __invoke(User $user)
    {
        $this->authorize('view-users', User::class);

        $requests = Request::where('user_id', $user->id)->get();

        return RequestData::collect($requests);
    }
}
