<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    protected $table = 'slider_images';
    protected $fillable = [
        'id',
        'image',
        'image_id',
        'slider_id',
    ];
}
