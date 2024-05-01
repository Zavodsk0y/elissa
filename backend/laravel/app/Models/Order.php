<?php

namespace App\Models;

use App\Enums\Order\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'total_amount',
        'referral_amount',
        'user_id'
    ];

    public function items(): hasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function isCreated(): bool
    {
        return $this->status === OrderStatus::Created->value;
    }

    public function isConfirmed(): bool
    {
        return $this->status === OrderStatus::Confirmed->value;
    }
}
