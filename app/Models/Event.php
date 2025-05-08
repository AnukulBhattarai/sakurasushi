<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'phone',
        'status',
        'email',
        'date',
        'location',
        'extra',
    ];

    protected $casts = [
        'extra' => 'array',
    ];
}
