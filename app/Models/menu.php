<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menus';
    protected $fillable =[
        'itemID',
        'itemTitle',
        'itemSlug'
    ];

}
