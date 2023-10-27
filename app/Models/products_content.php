<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_content extends Model
{
    protected $fillable =[
        'product_id',
        'lang',
        'title',
        'short_des',
        'description',
        'technic_des',
        'seo_title',
        'seo_desc',
        'seo_keyword',
    ];
}
