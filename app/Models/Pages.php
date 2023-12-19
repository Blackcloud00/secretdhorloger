<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pages extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable =[
        'id',
        'parent',
        'slug',
        'nameFR',
        'nameEN',
        'nameDE',
        'contentFR',
        'contentEN',
        'contentDE',
        'banner_img',
        'status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nameFR'
            ]
        ];
    }
}
