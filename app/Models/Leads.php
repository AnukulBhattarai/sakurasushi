<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'program_id',
        'date_of_visit',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
