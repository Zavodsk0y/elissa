<?php

namespace App\Filters\Part;

use EloquentFilter\ModelFilter;

class PartFilter extends ModelFilter
{
    public $relations = [
        'category' => ['categoryName']
    ];

    public function header($header): PartFilter
    {
        return $this->where('header', 'LIKE', "%$header%");
    }

    public function description($description): PartFilter
    {
        return $this->where('description', 'LIKE', "%$description%");
    }

    public function price($price): PartFilter
    {
        return $this->where('price', '=', $price);
    }

    public function minPrice($price): PartFilter
    {
        return $this->where('price', '>=', $price);
    }

    public function maxPrice($price): PartFilter
    {
        return $this->where('price', '<=', $price);
    }

    public function search($term): PartFilter
    {
        return $this->where(function($query) use ($term) {
            $query->where('header', 'LIKE', "%$term%")
                ->orWhere('description', 'LIKE', "%$term%");
        });
    }
}
