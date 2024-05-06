<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'flat_id',
        'flatSale_id',
        'payment_type',
        'amount',
        'bank_name',
        'branch',
        'account_number',
        'check_number',
        'status',

        'received_by',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function flat(): BelongsTo
    {
        return $this->belongsTo(Flat::class);
    }

    public function saleInfo(): BelongsTo
    {
        return $this->belongsTo(FlatSaleInfo::class);
    }
}