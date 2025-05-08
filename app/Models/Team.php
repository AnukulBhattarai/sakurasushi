<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'position',
        'status',
        'profile',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'extra',
    ];

    protected $casts = [
        'extra' => 'array',
    ];
}
