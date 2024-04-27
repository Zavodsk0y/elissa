<?php

namespace App\Actions\Category;

use App\Data\Category\CategoryData;
use App\Data\Category\UpdateCategoryData;
use App\Models\Category;

class UpdateCategoryAction
{
    public static function execute(UpdateCategoryData $data, Category $category): CategoryData
    {
        $category->update(
            [...$data->all()]
        );

        return CategoryData::fromModel($category);
    }
}
