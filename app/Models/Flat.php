<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flat extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'name',
        'flat_area',
        'price',//Price/per Sqft
        'room',
        'dining_space',
        'bath_room',
        'description',
        'Parking',
        'Outdoor',
        'sale_status',
        'status',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function project(): BelongsTo
    {
        return $this->BelongsTo(Project::class);
    }
}
