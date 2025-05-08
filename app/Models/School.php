<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    protected $fillable = [
        'name',
        'address',
        'description',
        'weekly_schedule',
        'phone',
        'email',
        'time',
        'thumbnail',
        'status',
        'extra',
    ];

    protected $casts = [
        'extra' => 'array',
    ];
}
