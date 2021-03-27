<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    protected $table = 'posts';
    protected $fillable =[
        'url',
        'code',
        'meta_title',
        'meta_desc',
        'status',
        'image',
        'userID',
        'siteID',
        'catID'
    ];

    public function user(){
        return  $this->belongsTo(User::class,'userID','id');

    }
}
