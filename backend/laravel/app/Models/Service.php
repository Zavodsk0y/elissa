<?php

namespace App\Models;

use App\Filters\Service\ServiceFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory, Filterable;

    public function modelFilter(): ?string
    {
        return $this->provideFilter(ServiceFilter::class);
    }

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
