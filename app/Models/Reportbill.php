<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reportbill extends Model
{
    protected $table ='area';

    protected $fillable = [
        'id_bill',
        'name_customer',
        'total',
        'date_order',
        'phone_customer',
        'address_customer',
        'status',
    ];
}
