<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['title', 'description', 'thumbnail', 'status', 'extra'];

    protected $casts = [
        'extra' => 'array',
    ];

    public function image()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
}
