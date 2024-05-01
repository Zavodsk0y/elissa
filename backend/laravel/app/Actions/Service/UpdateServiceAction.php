<?php

namespace App\Actions\Part;

use App\Data\Part\UpdatePartData;
use App\Data\Part\PartShowData;
use app\Data\Service\ServiceShowData;
use App\Data\Service\UpdateServiceData;
use App\Models\Part;
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
