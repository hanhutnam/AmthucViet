<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $table ='pay';

    protected $fillable = [
        'user_id',
        'deal_code',
        'amount',
        'bank_code',
        'card_type',
        'order_info',
        'created_at',
        'updated_at',
    ];
}
