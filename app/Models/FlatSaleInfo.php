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
        'price',
        'status',
        'sold_by',
        'created_by',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class );
    }

    public function installment(): BelongsTo
    {
        return $this->belongsTo(Installment::class, 'flatSale_id' );
    }

}
