<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['body', 'priority', 'is_done'];

     protected $casts = [
        'is_done' => 'boolean',
        'priority' => 'boolean',
    ];
}
