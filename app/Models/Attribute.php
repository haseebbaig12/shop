<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';
    protected $fillable = [
        'id',
        'code',
        'language',
        'status',
        'userID',
        'siteID',
    ];
}
