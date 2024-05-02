<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class FlatReturnInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'flat_id',
        'client_id',
        'buying_price',
        'payable_amount',
        'payment_type',
        'return_amount',
        'status',
        'sold_by',
        'booking_by',
        'return_by',
    ];
}
