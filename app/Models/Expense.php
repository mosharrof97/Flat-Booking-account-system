<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'date',
        'name',
        'quantity',
        'unit',
        'price',
        'total_price',
        'total',
    ];

    protected $casts = [
        'name' => 'array',
        'quantity' => 'array',
        'unit' => 'array',
        'price' => 'array',
        'total_price' => 'array',
    ];

    public function project() {
       return $this->BelongsTo(Project::class);
    }
}
