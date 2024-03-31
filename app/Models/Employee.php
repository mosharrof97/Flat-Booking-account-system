<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
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
    ];

}
