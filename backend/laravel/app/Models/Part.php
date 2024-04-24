<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Part extends Model
{
    use HasFactory;

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
