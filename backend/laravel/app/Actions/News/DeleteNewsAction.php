<?php

namespace App\Actions\News;

use App\Models\News;
use Illuminate\Http\JsonResponse;

class DeleteNewsAction
{
    public static function execute(News $news): JsonResponse
    {
        $news->delete();

        return response()->json(['message' => 'Новость удалена']);
    }
}
