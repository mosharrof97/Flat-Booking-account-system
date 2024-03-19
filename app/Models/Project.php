<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'projectName',
        'budget',
        'land_area',
        'duration',
        'flat',
        'flat_area',
        'start_date',
        'end_date',
        'address',
        'city',
        'district_id',
        'zipCode',
        'status',
    ];
}
