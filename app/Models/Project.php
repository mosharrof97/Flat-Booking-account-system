<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;



class Project extends AuthenticatableUser implements Authenticatable

// class Project extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'projectName',
        'budget',
        'land_area',
        'front_road',
        'property_type',
        'floor',
        'comm_space_size',
        'num_of_basement',
        'flat',
        'duration',
        'start_date',
        'end_date',
        'address',
        'city',
        'district_id',
        'zipCode',
        'image',
        'status',
        'active_status',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function district(): BelongsTo
    {
        return $this->BelongsTo(District::class);
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class,'id');
    }

    public function investment(){
        return $this->HasMany(Investment::class, 'project_id');
    }

    public function expense() {
        return $this->HasMany(Expense::class, 'project_id');
    }

    public function purchase() {
        return $this->HasMany(Purchase::class, 'project_id');
    }

    public function flat() {
        return $this->HasMany(Flat::class, 'project_id');
    }


}
