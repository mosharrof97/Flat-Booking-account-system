<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
