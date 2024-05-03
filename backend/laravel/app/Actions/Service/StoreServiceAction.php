<?php

namespace App\Actions\Service;

use App\Data\Part\PartShowData;
use App\Data\Service\ServiceShowData;
use App\Data\Service\StoreServiceData;
use App\Models\Service;

class StoreServiceAction
{
    public static function execute(StoreServiceData $data): ServiceShowData
    {
        $path = $data->image->store('services_images', 'public');

        $service = Service::create([
            'header' => $data->header,
            'description' => $data->description,
            'price' => $data->price,
            'image_path' => $path,
        ]);

        return ServiceShowData::from($service);
    }
}
