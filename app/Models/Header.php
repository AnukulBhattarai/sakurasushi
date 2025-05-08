<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = ['title', 'subtitle', 'section', 'extra'];

    protected $casts = [
        'extra' => 'array'
    ];
}
