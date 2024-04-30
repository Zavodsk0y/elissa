<?php

namespace App\Models;

use App\Enums\Order\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'total_amount',
        'user_id'
    ];

    public function isCreated(): bool
    {
        return $this->status === OrderStatus::Created->value;
    }

    public function isConfirmed(): bool
    {
        return $this->status === OrderStatus::Confirmed->value;
    }
}
