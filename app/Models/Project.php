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
        'email',
        'password',
        'budget',
        'land_area',
        'duration',
        'floor',
        'flat',
        'flat_area',
        'start_date',
        'end_date',
        'address',
        'city',
        'district_id',
        'zipCode',
        'image',
        'status',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function district(): BelongsTo
    {
        return $this->BelongsTo(District::class);
    }

    public function investment(){
        return $this->HasMany(Investment::class, 'project_id');
    }

    public function expense() {
        return $this->HasMany(Expense::class, 'project_id');
    }


}
