<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'surname', 'name', 'tel', 'mail' , 'pass' , 'address_up' , 'address_down' ,'company','bekongs','hiredate',
    ];

    protected $hidden = [
    ];

    protected $casts = [
        'birthday' => 'date',
        'lat' , 'lng' => 'mediumInteger',
    ];
}
