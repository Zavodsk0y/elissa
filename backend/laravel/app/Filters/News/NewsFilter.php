<?php

namespace App\Filters\News;

use EloquentFilter\ModelFilter;

class NewsFilter extends ModelFilter
{
    public function title($title): NewsFilter
    {
        return $this->where('title', 'LIKE', "%$title%");
    }

    public function text($text): NewsFilter
    {
        return $this->where('text', 'LIKE', "%$text%");
    }

    public function search($term): NewsFilter
    {
        return $this->where(function($query) use ($term) {
            $query->where('title', 'LIKE', "%$term%")
                ->orWhere('text', 'LIKE', "%$term%");
        });
    }
}
