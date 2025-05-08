<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTitle extends Model
{

    protected $fillable = ['title', 'page', 'extra'];

    protected $casts = [
        'extra' => 'array'
    ];
}
