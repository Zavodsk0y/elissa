<?php

namespace app\Actions\Part;

use app\Data\Part\PartData;
use app\Data\Part\PartShowData;
use App\Models\Part;

class SavePartAction
{
    public static function execute(PartData $data): PartShowData
    {
        $part = Part::updateOrCreate(
            ['id' => $data->id],
            [...$data->all()]
        );

        return $part->refresh()->getData();
    }
}
