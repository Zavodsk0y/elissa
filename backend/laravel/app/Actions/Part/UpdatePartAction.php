<?php

namespace App\Actions\Part;

use App\Data\Part\UpdatePartData;
use App\Data\Part\PartShowData;
use App\Models\Part;
use Illuminate\Support\Facades\Storage;

class UpdatePartAction
{
    public static function execute(UpdatePartData $data, Part $part): PartShowData
    {
        if ($data->image) {
            if ($part->image_path) {
                Storage::disk('public')->delete($part->image_path);
            }

            $path = $data->image->store('parts_images', 'public');
            $part->image_path = $path;
        }

        $part->update([
            'category_id' => $data->categoryId,
            'header' => $data->header,
            'description' => $data->description,
            'price' => $data->price
        ]);

        return PartShowData::fromModel($part);
    }
}
