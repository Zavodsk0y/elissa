<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStatusHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'previous_status',
        'new_status',
        'changed_by_user_id',
        'created_at',
    ];

    public $timestamps = false;

    protected $table = 'service_request_status_history';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = now();
        });
    }
}