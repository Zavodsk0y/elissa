<?php

namespace App\Models;

use app\Data\Part\PartData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\LaravelData\WithData;

class Part extends Model
{
    use HasFactory;
    use WithData;

    protected string $dataClass = PartData::class;

    protected $fillable = [
        'category_id',
        'header',
        'description',
        'price'
    ];

    public function category(): hasOne
    {
        return $this->hasOne(Category::class);
    }
}
