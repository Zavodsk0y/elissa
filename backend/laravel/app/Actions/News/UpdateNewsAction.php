<?php

namespace App\Actions\News;

use App\Data\News\NewsData;
use App\Data\News\UpdateNewsData;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class UpdateNewsAction
{
    public static function execute(UpdateNewsData $data, News $news): NewsData
    {
        if ($data->image) {
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }

            $path = $data->image->store('news_images', 'public');
            $news->image_path = $path;
        }

        $news->update([
            'title' => $data->title,
            'text' => $data->text
        ]);

        return NewsData::fromModel($news);
    }
}
