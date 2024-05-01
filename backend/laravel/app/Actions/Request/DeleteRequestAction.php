<?php

namespace App\Actions\Request;

use App\Exceptions\Request\RequestAlreadyConfirmedOrDoneException;
use App\Models\Request;
use Illuminate\Http\JsonResponse;

class DeleteRequestAction
{
    public static function execute(Request $request): JsonResponse
    {
        throw_unless($request->isCreated(), RequestAlreadyConfirmedOrDoneException::class);

        $request->delete();

        return response()->json(['message' => 'Заявка успешно удалена']);
    }
}
