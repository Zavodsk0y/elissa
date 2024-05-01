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
        $service = Service::create(
            [...$data->all()]
        );

        return ServiceShowData::from($service);
    }
}
