<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReturn extends Model
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
}
