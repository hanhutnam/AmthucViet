<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table ='bill_detail';

    protected $fillable = [
        'qty',
        'unit_price',
        'sum',
        'id_bill',
        'id_product',
        'id_restaurant',
        'created_at',
        'updated_at',
    ];
}
