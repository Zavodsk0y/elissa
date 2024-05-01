<?php

namespace App\Actions\Service;

use App\Data\Part\PartShowData;
use app\Data\Service\ServiceShowData;
use App\Data\Service\StoreServiceData;
use App\Models\Service;

class StoreServiceAction
{
    public static function execute(StoreServiceData $data): ServiceShowData
    {
        $service = Service::create(
            [...$data->all()]
        );

        return PartShowData::from($service);
    }
}
