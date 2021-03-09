<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $fillable = [
        'name',
        'code',
        'status',
        'user_id',
        'site_id',
    ];
}
