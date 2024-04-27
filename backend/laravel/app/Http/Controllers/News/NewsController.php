<?php

namespace App\Http\Controllers\News;

use App\Actions\News\SaveNewsAction;
use App\Actions\News\StoreNewsAction;
use App\Actions\News\UpdateNewsAction;
use App\Actions\News\UpsertNewsAction;
use App\Data\News\NewsData;
use App\Data\News\StoreNewsData;
use App\Data\News\UpdateNewsData;
use App\Data\News\UpsertNewsData;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $paginatedNews = News::orderBy('created_at', 'desc')->paginate(10);
        return NewsData::collect($paginatedNews);
    }

    public function show(News $news)
    {
        return NewsData::fromModel($news);
    }

    public function store(StoreNewsData $data): JsonResponse
    {
        return response()->json(
            StoreNewsAction::execute($data),
            201
        );
    }

    public function update(Request $request, News $news): NewsData
    {
        $request->request->add(['id' => $news->id]);
        $data = UpdateNewsData::fromRequest($request, $news);
        return UpdateNewsAction::execute($data, $news);

    }

    public function delete()
    {

    }
}
