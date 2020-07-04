<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table ='restaurant';

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'id_area',
        'id_user',
        'note',
        'created_at',
        'updated_at',
    ];
}
