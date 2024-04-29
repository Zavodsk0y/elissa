<?php

namespace App\Actions\Part;

use App\Data\Part\UpdatePartData;
use App\Data\Part\PartShowData;
use App\Models\Part;

class UpdatePartAction
{
    public static function execute(UpdatePartData $data, Part $part): PartShowData
    {
        $part->update(
            [...$data->all()]
        );

        return PartShowData::fromModel($part);
    }
}
