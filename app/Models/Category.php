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
        'p_id',
        'seo_title',
        'seo_desc',
        'meta_key',
        'userID',
        'siteID',
    ];

//    public  function chiled(){
//        return  $this->hasMany('App\Models\Category','p_id');
//    }
}
