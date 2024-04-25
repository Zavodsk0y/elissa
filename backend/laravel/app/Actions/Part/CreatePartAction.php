<?php

namespace app\Actions\Part;

use app\Data\Part\PartData;
use App\Models\Part;

class CreatePartAction
{
    public static function execute(PartData $data)
    {
        $part = Part::create([
            ...$data->all()
        ]);

        return $part->getData();
    }
}
