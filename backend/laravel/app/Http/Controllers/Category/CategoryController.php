<?php

namespace App\Http\Controllers\Category;

use App\Actions\Category\StoreCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
use App\Data\Category\CategoryData;
use App\Data\Category\StoreCategoryData;
use App\Data\Category\UpdateCategoryData;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $paginatedCategories = Category::orderBy('created_at', 'desc')->paginate(10);
        return CategoryData::collect($paginatedCategories);
    }

    public function show(Category $category): CategoryData
    {
        return CategoryData::fromModel($category);
    }

    public function store(StoreCategoryData $data): JsonResponse
    {
        return response()->json(
            StoreCategoryAction::execute($data),
            201
        );
    }

    public function update(Request $request, Category $category): CategoryData
    {
        $request->request->add(['id' => $category->id]);
        $data = UpdateCategoryData::validateAndCreate($request);
        return UpdateCategoryAction::execute($data, $category);

    }

    public function delete()
    {

    }
}
