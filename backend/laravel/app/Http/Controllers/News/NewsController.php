<?php

namespace App\Http\Controllers\News;

use App\Actions\News\DeleteNewsAction;
use App\Actions\News\StoreNewsAction;
use App\Actions\News\UpdateNewsAction;
use App\Data\News\NewsData;
use App\Data\News\StoreNewsData;
use App\Data\News\UpdateNewsData;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $paginatedNews = News::orderBy('created_at', 'desc')->paginate(10);
        return NewsData::collect($paginatedNews);
    }

    public function show(News $news): NewsData
    {
        return NewsData::fromModel($news);
    }

    public function store(StoreNewsData $data): JsonResponse
    {
        $this->authorize('news add', News::class);

        return response()->json(
            StoreNewsAction::execute($data),
            201
        );
    }

    public function update(Request $request, News $news): NewsData
    {
        $this->authorize('news update', News::class);

        $request->request->add(['id' => $news->id]);
        $data = UpdateNewsData::fromRequest($request, $news);
        return UpdateNewsAction::execute($data, $news);

    }

    public function destroy(News $news): JsonResponse
    {
        $this->authorize('news delete', News::class);

        return DeleteNewsAction::execute($news);
    }
}
