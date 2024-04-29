<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Installment extends Model
{
    use HasFactory;
    protected $fillable = [
        'flatSale_id',
        'payment_type',
        'amount',
        'bank_name',
        'branch',
        'account_number',
        'check_number',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function flatSaleInfo(): BelongsTo
    {
        return $this->BelongsTo(FlatSaleInfo::class);
    }
}
