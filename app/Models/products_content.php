<?php

namespace App\Models;

use App\Models\products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products_content extends Model
{
    use HasFactory;
    protected $fillable =[
        'products_id',
        'lang',
        'title',
        'short_des',
        'description',
        'technic_des',
        'seo_title',
        'seo_desc',
        'seo_keyword',
    ];


    public function products()
    {
        return $this->belongsTo(products::class);
    }
}
