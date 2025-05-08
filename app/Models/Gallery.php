<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    protected $fillable = ['name', 'order', 'extra'];

    protected $casts = [
        'extra' => 'array'
    ];

    public function image()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
}
