<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'client_id',
        'project_id',
        'total_Investment',
        'installment_type',
        'profit_type',
        'profit',


        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function client(){
        return $this->BelongsTo(Client::class);
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
