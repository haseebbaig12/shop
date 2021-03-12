<?php

namespace App\Models;
//use Auth;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = [
        'name',
        'sku',
        'status',
        'user_id',
        'site_id',
    ];

}
