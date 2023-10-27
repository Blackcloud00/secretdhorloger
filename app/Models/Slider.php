<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable =[
        'image',
        'small_text',
        'lang',
        'text_key',
        'name',
        'button_content',
        'content',
        'link',
        'status',
    ];
}
