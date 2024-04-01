<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'phone',
        'nid',
        'email',
        'role_id',
        'designation',
        'password',
        'active_status',
        'status',
        'image',

        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function employeeAddress(): HasMany
    {
        return $this->hasMany(EmployeeAddress::class, 'employee_id');
    }
}
