<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'active_status',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function expense() {
        return $this->HasMany(Expense::class, 'vendor_id');
    }
}
