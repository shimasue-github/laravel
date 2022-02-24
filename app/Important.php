<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Important extends Model
{
    protected $fillable = [
        'bigname', 'name','pass',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];
}
