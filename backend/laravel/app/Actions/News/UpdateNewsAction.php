<?php

namespace App\Actions\News;

use App\Data\News\NewsData;
use App\Data\News\UpdateNewsData;
use App\Models\News;

class UpdateNewsAction
{
    public static function execute(UpdateNewsData $data, News $news): NewsData
    {
        $news->update(
            [...$data->all()]
        );

        return NewsData::from($news);
    }
}
