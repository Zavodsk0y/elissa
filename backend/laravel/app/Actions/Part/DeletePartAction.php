<?php

namespace App\Actions\Part;

use App\Models\Part;
use Illuminate\Http\JsonResponse;

class DeletePartAction
{
    public static function execute(Part $part): JsonResponse
    {
        $part->delete();

        return response()->json(['message' => 'Запчасть удалена']);
    }
}
