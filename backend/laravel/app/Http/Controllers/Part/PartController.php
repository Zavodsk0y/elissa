<?php

namespace App\Http\Controllers\Part;

use App\Actions\Part\DeletePartAction;
use App\Actions\Part\StorePartAction;
use App\Actions\Part\UpdatePartAction;
use App\Data\Part\UpdatePartData;
use App\Data\Part\PartShowData;
use App\Data\Part\StorePartData;
use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PartController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $paginatedParts = Part::orderBy('created_at', 'asc')->paginate(10);
        return PartShowData::collect($paginatedParts);
    }

    public function store(StorePartData $data): JsonResponse
    {
        $this->authorize('part add', Part::class);

        return response()->json(StorePartAction::execute($data), 201);
    }

    public function show(Part $part): PartShowData
    {
        return PartShowData::fromModel($part);
    }

    public function update(Request $request, Part $part): PartShowData
    {
        $this->authorize('part update', Part::class);

        $request->request->add(['id' => $part->id]);
        $data = UpdatePartData::fromRequest($request, $part);
        return UpdatePartAction::execute($data, $part);
    }

    public function destroy(Part $part): JsonResponse
    {
        $this->authorize('part delete', Part::class);

        return DeletePartAction::execute($part);
    }
}
