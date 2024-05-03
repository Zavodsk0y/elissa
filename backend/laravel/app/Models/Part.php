<?php

namespace App\Models;

use App\Data\Part\PartShowData;
use App\Filters\Part\PartFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\LaravelData\WithData;

class Part extends Model
{
    use HasFactory, WithData, Filterable;

    public function modelFilter(): ?string
    {
        return $this->provideFilter(PartFilter::class);
    }

    protected string $dataClass = PartShowData::class;

    protected $table = 'repair_parts';

    protected $fillable = [
        'category_id',
        'header',
        'description',
        'price',
        'image_path'
    ];

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
