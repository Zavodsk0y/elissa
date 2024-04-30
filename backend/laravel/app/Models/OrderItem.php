<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    public $timestamps = false;

    protected $fillable = [
        'part_id',
        'quantity',
        'order_id'
    ];

    public function order(): belongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function part(): belongsTo
    {
        return $this->belongsTo(Part::class);
    }
}
