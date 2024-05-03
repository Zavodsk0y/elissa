<?php

namespace App\Actions\News;

use App\Data\News\NewsData;
use App\Data\News\StoreNewsData;
use App\Models\News;

class StoreNewsAction
{
    public static function execute(StoreNewsData $data): NewsData
    {
        $path = $data->image->store('news_images', 'public');

        $news = News::create([
            'title' => $data->title,
            'text' => $data->text,
            'image_path' => $path,
        ]);

        return NewsData::fromModel($news);
    }
}
