<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\AssignEmployeeAction;
use App\Data\User\UserData;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AssignEmployeeController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(User $user): UserData
    {
        $this->authorize('assign-roles', User::class);

        return AssignEmployeeAction::execute($user);
    }
}
