<?php

namespace app\Http\Controllers\Service;

use app\Data\Part\PartShowData;
use App\Models\Part;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\PaginatedDataCollection;

class PartController
{
    public function index(Request $request): JsonResponse
    {
        $paginatedParts = Part::with('category')->paginate(10);
        $partsData = PartShowData::collect($paginatedParts, PaginatedDataCollection::class);
        return response()->json($partsData);
    }

    public function store()
    {

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
