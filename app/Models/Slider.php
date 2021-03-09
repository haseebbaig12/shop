<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'id',
        'name',
        'status',
        'user_id',
        'site_id',
    ];
}
