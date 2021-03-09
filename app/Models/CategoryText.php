<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryText extends Model
{
    protected $table = 'category_texts';
    protected $fillable = [
        'id',
        'categoryID',
        'language',
        'title',
        'short_description',
    ];
}
