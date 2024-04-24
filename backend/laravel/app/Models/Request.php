<?php

namespace App\Models;

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
}
