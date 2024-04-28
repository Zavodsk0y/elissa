<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReferralCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'referral_code'
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
