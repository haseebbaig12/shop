<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_Text extends Model
{
    protected $table = 'post_texts';
    protected $fillable = [
        'postID',
        'title',
        'post_text',
        'languageID',
        'short_desc',
    ];
    // public function def(){
    //     return $this->belongsTo(Pages::class,'pagesID');
    // }
}
