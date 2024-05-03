<?php

namespace App\Actions\Part;

use App\Data\Part\PartShowData;
use App\Data\Part\StorePartData;
use App\Models\Part;

class StorePartAction
{
    public static function execute(StorePartData $data): PartShowData
    {
        $path = $data->image->store('parts_images', 'public');

        $part = Part::create([
            'category_id' => $data->categoryId,
            'header' => $data->header,
            'description' => $data->description,
            'price' => $data->price,
            'image_path' => $path,
        ]);

        return PartShowData::fromModel($part);
    }
}
