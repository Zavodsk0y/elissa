<?php

namespace app\Http\Controllers\Service;

use app\Actions\Part\SavePartAction;
use app\Data\Part\PartData;
use app\Data\Part\PartShowData;
use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\LaravelData\PaginatedDataCollection;

class PartController extends Controller
{
    public function index(Request $request): Collection
    {
        $paginatedParts = Part::with('category')->paginate(10);
        return PartShowData::collect($paginatedParts, PaginatedDataCollection::class);
    }

    public function store(PartData $data)
    {
        return SavePartAction::execute($data);
    }

    public function show(Part $part): PartShowData
    {
        return PartShowData::fromModel($part);
    }

    public function update(Request $request, Part $part)
    {
        $request->request->add(['id' => $part->id]);

        return SavePartAction::execute(PartData::validateAndCreate($request));
    }

    public function delete()
    {

    }
}
