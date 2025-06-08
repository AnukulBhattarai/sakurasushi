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
        'type',
    ];

    protected $casts = [
        'extra' => 'array',
    ];

    public function program()
    {
        return $this->belongsToMany(Program::class)->withTimestamps()->withPivot('enrolled_at');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
