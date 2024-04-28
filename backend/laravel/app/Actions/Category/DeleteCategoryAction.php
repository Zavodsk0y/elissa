<?php

namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class DeleteCategoryAction
{
    public static function execute(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json(['message' => 'Категория удалена']);
    }
}
