<?php

namespace App\Actions\Part;

use App\Data\Part\PartShowData;
use App\Data\Part\StorePartData;
use App\Models\Part;

class StorePartAction
{
    public static function execute(StorePartData $data): PartShowData
    {
        $part = Part::create(
            [...$data->all()]
        );

        return PartShowData::fromModel($part);
    }
}
