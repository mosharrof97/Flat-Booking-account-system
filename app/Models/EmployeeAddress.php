<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'pre_address',
        'pre_city',
        'pre_district',
        'pre_zipCode',

        'per_address',
        'per_city',
        'per_district',
        'per_zipCode',
    ];
}
