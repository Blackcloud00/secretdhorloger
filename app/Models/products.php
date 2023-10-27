<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products extends Model
{
    use Sluggable;
    protected $fillable =[
        'name',
        'category_id',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
        'img_5',
        'slug',
        'sku',
        'price',
        'status',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
