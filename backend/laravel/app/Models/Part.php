<?php

namespace App\Models;

use App\Data\Part\PartShowData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\LaravelData\WithData;

class Part extends Model
{
    use HasFactory;
    use WithData;

    protected string $dataClass = PartShowData::class;

    protected $table = 'repair_parts';

    protected $fillable = [
        'category_id',
        'header',
        'description',
        'price'
    ];

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
