<?php

namespace App\Models;

use app\Enums\Request\RequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'service_id',
        'status'
    ];

    public function service(): belongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function isCreated(): bool
    {
        return $this->status === RequestStatus::Created->value;
    }

    public function isConfirmed(): bool
    {
        return $this->status === RequestStatus::Confirmed->value;
    }
}
