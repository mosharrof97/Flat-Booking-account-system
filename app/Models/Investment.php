<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Investment extends Model
{
    use HasFactory;
    protected $fillable = [
        'investor_id',
        'project_id',
        'total_Investment',
        'installment_type',
        'profit_type',
        'profit',


    ];

    public function investor(){
        return $this->BelongsTo(Investor::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class );
    }

    public function installment(): BelongsTo
    {
        return $this->belongsTo(InvestInstallment::class, 'investment_id' );
    }
}
