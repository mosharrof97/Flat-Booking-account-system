<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDuePay extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'purchase_id',
        'invoice_no',
        'Return_invoice_no',
        'due',
        'pay',
    ];
}
