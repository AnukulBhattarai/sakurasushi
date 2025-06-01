<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    public $fillable = [
        'certificate_no',
        'student_id',
        'program_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
