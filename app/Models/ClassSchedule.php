<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $fillable = [
        'student_class_id',
        'subject_id',
        'teacher_id',
        'day',
        'start_time',
        'end_time',
    ];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
