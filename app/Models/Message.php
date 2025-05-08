<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name', 'email', 'number', 'service', 'message', 'program_id'];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
