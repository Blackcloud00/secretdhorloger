<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;
    protected $fillable =[
      'name',
      'image',
      'parent',
      'slug',
      'seo_title',
      'seo_desc',
      'seo_keyword',
      'status'
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_fr'
            ]
        ];
    }
}
