<?php

namespace App\Actions\News;

use App\Data\News\NewsData;
use App\Data\News\StoreNewsData;
use App\Models\News;

class StoreNewsAction
{
    public static function execute(StoreNewsData $data): NewsData
    {
        $news = News::create(
            [
                ...$data->all(),
            ]
        );
        return NewsData::fromModel($news);
    }
}
