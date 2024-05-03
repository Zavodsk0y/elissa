<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'header',
        'description',
        'price',
        'image_path'
    ];

    public function request(): belongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
