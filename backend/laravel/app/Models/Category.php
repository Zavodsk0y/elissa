<?php

namespace App\Models;

use app\Data\Category\CategoryData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\LaravelData\WithData;

class Category extends Model
{
    use HasFactory;
    use WithData;

    protected string $dataClass = CategoryData::class;

    protected $table = 'parts_categories';

    protected $fillable = [
        'name'
    ];

    public function part(): belongsTo
    {
        return $this->belongsTo(Part::class);
    }
}
