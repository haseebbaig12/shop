<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';
    protected $fillable = [
        'id',
        'product_id',
        'ide',
        'variation',
        'price',
        'attribute',

    ];
}
