<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table ='slide';

    protected $fillable = [
        'link_img',
        'created_at',
        'updated_at',
    ];
}
