<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class FlatSaleInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'flat_id',
        'client_id',
        'buying_price',
        'status',
        'sold_by',
        'booking_by',
    ];

}
