<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable =[
        'id',
        'slug',
        'nameFR',
        'nameEN',
        'nameDE',
        'contentFR',
        'contentEN',
        'contentDE',
        'banner_img',
        'campaign_type',
        'discount_rate',
        'discount_code',
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
