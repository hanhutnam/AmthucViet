<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table ='customer';

    protected $fillable = [
        'name',
        'gender',
        'email',
        'address',
        'phone',
        'created_at',
        'updated_at',
    ];
}
