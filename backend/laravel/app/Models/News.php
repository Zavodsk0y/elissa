<?php

namespace App\Models;

use app\Data\News\NewsData;
use App\Filters\News\NewsFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, Filterable;

    public function modelFilter(): ?string
    {
        return $this->provideFilter(NewsFilter::class);
    }

    protected string $dataClass = NewsData::class;

    protected $fillable = [
        'title',
        'text',
        'image_path'
    ];
}
