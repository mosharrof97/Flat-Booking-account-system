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
        'user_id',
        'project_id',
        'client_id',
        'name',
        'flat_area',
        'price',//Price/per Sqft
        'room',
        'dining_space',
        'bath_room',
        'description',
        'parking',
        'outdoor',
        'image',
        'active_status',
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


    // public function count(){
    //     return Flat::where('sale_status', $this->sale_status)->count();
    // }
}
