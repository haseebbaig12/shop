<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductText extends Model
{
    protected $table = 'product_texts';
    protected $fillable = [
        'id',
        'product_id',
        'name',
        'long_description',
        'short_description',
        'language',

    ];
}
