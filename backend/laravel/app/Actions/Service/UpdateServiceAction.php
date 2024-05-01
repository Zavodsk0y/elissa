<?php

namespace App\Actions\Service;

use App\Data\Service\ServiceShowData;
use App\Data\Service\UpdateServiceData;
use App\Models\Service;

class UpdateServiceAction
{
    public static function execute(UpdateServiceData $data, Service $service): ServiceShowData
    {
        $service->update(
            [...$data->all()]
        );

        return ServiceShowData::from($service);
    }
}
