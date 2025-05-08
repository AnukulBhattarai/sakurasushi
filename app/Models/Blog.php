<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'status', 'thumbnail', 'images', 'slug', 'description', 'extra'];

    protected $casts = [
        'images' => 'array',
        'extra' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return date("d-M-Y", strtotime($value));
    }

    public function image()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
}
