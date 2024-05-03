<?php

namespace App\Filters\Service;

use EloquentFilter\ModelFilter;

class ServiceFilter extends ModelFilter
{
    public function header($header): ServiceFilter
    {
        return $this->where('header', 'LIKE', "%$header%");
    }

    public function description($description): ServiceFilter
    {
        return $this->where('description', 'LIKE', "%$description%");
    }

    public function price($price): ServiceFilter
    {
        return $this->where('price', '=', $price);
    }

    public function minPrice($price): ServiceFilter
    {
        return $this->where('price', '>=', $price);
    }

    public function maxPrice($price): ServiceFilter
    {
        return $this->where('price', '<=', $price);
    }

    public function search($term): ServiceFilter
    {
        return $this->where(function ($query) use ($term) {
            $query->where('header', 'LIKE', "%$term%")
                ->orWhere('description', 'LIKE', "%$term%");
        });
    }
}
