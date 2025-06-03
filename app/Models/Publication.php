<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = ['title', 'file', 'status', 'thumbnail', 'extra'];

    protected $casts = [
        'extra' => 'array'
    ];
}
