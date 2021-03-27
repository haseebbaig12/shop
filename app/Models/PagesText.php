<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PagesText extends Model
{
    protected $table = 'pages_texts';
    protected $fillable = [
        'pagesID',
        'title',
        'page_text',
        'languageID'
    ];
    public function def(){
        return $this->belongsTo(Pages::class,'pagesID');
    }

}
