<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvestInstallment extends Model
{
    use HasFactory;
    protected $fillable = [
        'investment_id',
        'payment_type',
        'installment_amount',
        'bank_name',
        'branch',
        'account_number',
        'check_number',
    ];

    public function investment(): BelongsTo
    {
        return $this->BelongsTo(Investment::class);
    }
}
