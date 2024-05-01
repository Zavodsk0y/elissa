<?php

namespace App\Actions\Request;

use App\Data\Request\RequestData;
use App\Data\Request\StoreRequestData;
use App\Models\Request;

class StoreRequestAction
{
    public static function execute(StoreRequestData $data): RequestData
    {
        $request = Request::create(
            [...$data->all()]
        );

        return RequestData::fromModel($request);
    }
}
