<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function flat(): BelongsTo
    {
        return $this->belongsTo(Flat::class );
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class, 'id' );
    }
}
