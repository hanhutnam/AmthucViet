<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='product';

    protected $fillable = [
        'name',
        'describe',
        'unit_price',
        'promotion_price',
        'new_product',
        'link_img',
        'id_restaurant',
        'id_product_type',
        'active',
        'created_at',
        'updated_at',
    ];
}
