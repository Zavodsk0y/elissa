<?php

namespace App\Actions\News;

use App\Data\News\NewsData;
use App\Models\News;

class SaveNewsAction
{
    public static function execute(NewsData $data): NewsData
    {
        $news = News::updateOrCreate(
            ['id' => $data->id],
            [...$data->all()]
        );

        return NewsData::fromModel($news);
    }
}
