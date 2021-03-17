<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';
    protected $fillable =[
        'url',
        'code',
        'meta_title',
        'meta_desc',
        'status',
        'image',
        'userID',
        'siteID'
    ];

    public function user(){
        return  $this->belongsTo(User::class,'userID','id');

    }


}
