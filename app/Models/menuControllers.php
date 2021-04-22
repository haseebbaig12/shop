<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuControllers extends Model
{
    protected $table = 'menu_controllers';
    protected $fillable = [
        'id',
        'Sort_Array',
    ];
    use HasFactory;
  
}
