<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $table = 'locales';
    protected $fillable = [
        'language_id',
        'currency_id',
        'status',
        'user_id',
        'site_id',
    ];
}
