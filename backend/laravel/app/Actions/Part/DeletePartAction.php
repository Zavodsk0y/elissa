<?php

namespace App\Actions\Part;

use App\Models\Part;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeletePartAction
{
    public static function execute(Part $part): JsonResponse
    {
        Storage::disk('public')->delete($part->image_path);

        $part->delete();

        return response()->json(['message' => 'Запчасть удалена']);
    }
}
