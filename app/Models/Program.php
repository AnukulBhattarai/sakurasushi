<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'duration',
        'instructor',
        'category_id',
        'price',
        'extra',
    ];
    protected $casts = [
        'extra' => 'array',
    ];


    public function image()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps()->withPivot('enrolled_at');
    }

    public function leads()
    {
        return $this->hasMany(Leads::class);
    }
}
