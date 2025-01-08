<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseDuePay extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'date',
        'purchase_id',
        'invoice_no',
        'Return_invoice_no',
        'due',
        'pay',
        'created_by',
    ];

    protected $casts=[
        'date' =>'datetime',
    ];

    

    public function purchase() {
        return $this->BelongsTo(Purchase::class);
    }

    public function user() {
        return $this->BelongsTo(User::class, 'created_by');
    }

}
