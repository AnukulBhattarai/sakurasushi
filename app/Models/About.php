<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'side_image',
        'mission',
    ];

    protected $casts = [
        'mission' => 'array',
    ];
}
