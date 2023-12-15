<?php

namespace App\Models;

use App\Models\products;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use Sluggable;
    protected $fillable =[
      'name_en',
      'name_fr',
      'name_de',
      'image',
      'parent',
      'slug',
      'seo_title',
      'seo_desc',
      'seo_keyword',
      'status'
    ];
    public function items(){
        return $this->hasMany(products::class, 'category_id', 'id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_fr'
            ]
        ];
    }
}
