<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table ='bill';

    protected $fillable = [
        'order_date',
        'total_price',
        'id_customer',
        'status',
        'created_at',
        'updated_at',
    ];
}
