<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Role extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
    ];

    public function admin(){
        return $this->HasMany(Admin::class, 'role_id');
    }

    public function customer(){
    return $this->HasMany(Customer::class, 'role_id');
    }

    public function investor(){
    return $this->HasMany(Investor::class, 'role_id');
    }

    public function user(){
    return $this->HasMany(User::class, 'role_id');
    }
}
