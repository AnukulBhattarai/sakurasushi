<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'mobile',
        'email',
        'logo',
        'location',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'other',
    ];

    protected $casts = [
        'other' => 'array',
    ];
}
