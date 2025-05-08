<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['title', 'display_name', 'key', 'description', 'sections', 'extra'];

    protected $casts = [
        'sections' => 'array',
        'extra' => 'array',
    ];
}
