<?php

namespace App\Http\Controllers\News;

use App\Actions\News\SaveNewsAction;
use App\Actions\Part\SavePartAction;
use App\Data\News\NewsData;
use App\Data\Part\PartData;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Spatie\LaravelData\PaginatedDataCollection;

class NewsController extends Controller
{
    public function index()
    {
        $paginatedNews = News::all()->sortByDesc('created_at')->paginate(10);
        return NewsData::collect($paginatedNews, PaginatedDataCollection::class);
    }

    public function show(News $news)
    {
        return NewsData::fromModel($news);
    }

    public function store(NewsData $data): NewsData
    {
        return SaveNewsAction::execute($data);
    }

    public function update(Request $request, News $news): NewsData
    {
        $request->request->add(['id' => $news->id]);

        return SaveNewsAction::execute(NewsData::validateAndCreate($request));
    }

    public function delete()
    {

    }
}
