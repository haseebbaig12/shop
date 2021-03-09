<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userSite extends Model
{
    protected $table = 'user_site';
    protected $fillable = [
        'id',
        'site',
        'user',
    ];
}
