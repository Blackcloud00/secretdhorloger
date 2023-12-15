<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_name',
        'user_surname',
        'user_phone',
        'user_mail',
        'user_adress',
        'user_region',
        'user_city',
        'user_state',
        'user_postcode',
        'order_status',
        'product_count',
        'product_id',
        'product_price',
        'order_total_price',
    ];
}
