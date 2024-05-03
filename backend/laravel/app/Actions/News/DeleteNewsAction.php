<?php

namespace App\Actions\News;

use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeleteNewsAction
{
    public static function execute(News $news): JsonResponse
    {
        Storage::disk('public')->delete($news->image_path);

        $news->delete();

        return response()->json(['message' => 'Новость удалена']);
    }
}
