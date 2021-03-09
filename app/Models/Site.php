<?php

namespace App\Models;
use Auth;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';
    protected $fillable = [
        'id',
        'name',
        'sku',
        'status',
        'user_id',
    ];

}
