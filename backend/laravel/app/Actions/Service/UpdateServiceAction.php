<?php

namespace App\Actions\Service;

use App\Data\Service\ServiceShowData;
use App\Data\Service\UpdateServiceData;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class UpdateServiceAction
{
    public static function execute(UpdateServiceData $data, Service $service): ServiceShowData
    {
        if ($data->image) {
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }

            $path = $data->image->store('services_images', 'public');
            $service->image_path = $path;
        }

        $service->update([
            'header' => $data->header,
            'description' => $data->description,
            'price' => $data->price
        ]);

        return ServiceShowData::fromModel($service);
    }
}
