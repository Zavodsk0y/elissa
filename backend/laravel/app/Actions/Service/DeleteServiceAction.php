<?php

namespace App\Actions\Service;

use App\Models\Service;
use Illuminate\Http\JsonResponse;

class DeleteServiceAction
{
    public static function execute(Service $service): JsonResponse
    {
        $service->delete();

        return response()->json(['message' => 'Услуга удалена']);
    }
}
