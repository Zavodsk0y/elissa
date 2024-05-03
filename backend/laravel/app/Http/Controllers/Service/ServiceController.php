<?php

namespace App\Http\Controllers\Service;

use App\Actions\Service\DeleteServiceAction;
use App\Actions\Service\StoreServiceAction;
use App\Actions\Service\UpdateServiceAction;
use App\Data\Service\ServiceShowData;
use App\Data\Service\StoreServiceData;
use App\Data\Service\UpdateServiceData;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $paginatedServices = Service::filter($request->all())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return ServiceShowData::collect($paginatedServices);
    }

    public function store(StoreServiceData $data): JsonResponse
    {
        return response()->json(StoreServiceAction::execute($data), 201);
    }

    public function show(Service $service): ServiceShowData
    {
        return ServiceShowData::from($service);
    }

    public function update(Request $request, Service $service): ServiceShowData
    {
        $request->request->add(['id' => $service->id]);
        $data = UpdateServiceData::fromRequest($request, $service);
        return UpdateServiceAction::execute($data, $service);
    }

    public function destroy(Service $service): JsonResponse
    {
        return DeleteServiceAction::execute($service);
    }
}
