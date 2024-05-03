<?php

namespace App\Filters\Category;

use EloquentFilter\ModelFilter;

class CategoryFilter extends ModelFilter
{
    public function categoryName($name): CategoryFilter
    {
        return $this->where('name', 'LIKE', "%$name%");
    }
}
