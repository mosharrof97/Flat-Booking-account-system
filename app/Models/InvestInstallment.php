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
        'installment_amount',
    ];

    public function investment(): BelongsTo
    {
        return $this->BelongsTo(Investment::class);
    }
}
