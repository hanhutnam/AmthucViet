<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table ='product_type';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];
}
