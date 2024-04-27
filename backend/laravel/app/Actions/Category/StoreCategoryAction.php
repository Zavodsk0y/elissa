<?php

namespace App\Actions\Category;

use App\Data\Category\CategoryData;
use App\Data\Category\StoreCategoryData;
use App\Models\Category;

class StoreCategoryAction
{
    public static function execute(StoreCategoryData $data): CategoryData
    {
        $category = Category::create(
            [
                ...$data->all(),
            ]
        );
        return CategoryData::fromModel($category);
    }
}
