<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'link',
        'source',
        'extra'
    ];
    protected $casts = [
        'extra' => 'array',
    ];
}
