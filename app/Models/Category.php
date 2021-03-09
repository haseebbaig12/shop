<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'code',
        'image',
        'status',
        'seo_title',
        'seo_desc',
        'meta_key',
        'userID',
        'siteID',
    ];
}
