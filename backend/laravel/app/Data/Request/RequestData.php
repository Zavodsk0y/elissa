<?php

namespace App\Data\Request;

use App\Data\Service\ServiceShowData;
use App\Models\Request;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class RequestData extends Data
{
    public function __construct(
        public readonly int             $id,
        public readonly int             $userId,
        public readonly string          $phone,
        public readonly string          $status,
        public readonly ServiceShowData $service
    )
    {
    }

    public static function fromModel(Request $request)
    {
        return new self(
            $request->id,
            $request->user_id,
            $request->phone,
            $request->status,
            ServiceShowData::from($request->service)
        );
    }

}
