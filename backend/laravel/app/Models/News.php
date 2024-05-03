<?php

namespace App\Models;

use app\Data\News\NewsData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected string $dataClass = NewsData::class;

    protected $fillable = [
        'title',
        'text',
        'image_path'
    ];
}
