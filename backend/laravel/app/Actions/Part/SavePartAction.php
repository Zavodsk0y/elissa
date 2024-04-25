<?php

namespace app\Actions\Part;

use app\Data\Part\PartData;
use App\Models\Part;

class SavePartAction
{
    public static function execute(PartData $data)
    {
        $part = Part::updateOrCreate(
            ['id' => $data->id],
            [...$data->all()]
        );

        return $part->refresh()->getData();
    }
}
