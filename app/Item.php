<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['user_id', 'body', 'priority', 'is_done'];

    protected $casts = [
        'is_done' => 'boolean',
        'priority' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
