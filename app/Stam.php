<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stam extends Model
{
    protected $casts = [
        'day' => 'date',
        'in','out','interval','vacation' => 'date',
    ];
}
