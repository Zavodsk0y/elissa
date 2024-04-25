<?php

namespace App\Models;

use app\Enums\Request\RequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'service_id',
        'status'
    ];

    public function service(): hasOne
    {
        return $this->hasOne(Service::class);
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
