<?php

namespace app\Http\Controllers\Service;

use app\Actions\Part\CreatePartAction;
use app\Data\Part\PartData;
use app\Data\Part\PartShowData;
use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\PaginatedDataCollection;

class PartController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $paginatedParts = Part::with('category')->paginate(10);
        $partsData = PartShowData::collect($paginatedParts, PaginatedDataCollection::class);
        return response()->json($partsData);
    }

    public function store(PartData $data)
    {
        return CreatePartAction::execute($data);
    }

    public function show(Part $part)
    {
        return PartShowData::fromModel($part);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
