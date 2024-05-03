<?php

namespace App\Actions\Service;

use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeleteServiceAction
{
    public static function execute(Service $service): JsonResponse
    {
        Storage::disk('public')->delete($service->image_path);

        $service->delete();

        return response()->json(['message' => 'Услуга удалена']);
    }
}
