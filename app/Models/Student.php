<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'payment_remaining',
        'extra',
    ];

    protected $casts = [
        'extra' => 'array',
    ];

    public function courses()
    {
        return $this->belongsToMany(Program::class)->withTimestamps()->withPivot('enrolled_at');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
