<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $fillable = [
        'type',
        'student_id',
        'points',
        'notes',
        'reporter_teacher_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function reporterTeacher()
    {
        return $this->belongsTo(Teacher::class, 'reporter_teacher_id');
    }
}
