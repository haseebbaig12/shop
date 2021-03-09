<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeText extends Model
{
    protected $table = 'attribute_texts';
    protected $fillable = [
        'id',
        'name',
        'language',
        'attributeID',
    ];
}
