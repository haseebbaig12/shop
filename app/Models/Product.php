<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product_basic';
    protected $fillable = [
      
    
        'slug',
        'status',
        'user_id',
        'site_id',
        'meta_title',
        'meta_description',
        'feature_image',

        'price',
        'stock',

    ];

}
