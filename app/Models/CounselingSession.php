<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounselingSession extends Model
{
    protected $fillable = [
        'student_id',
        'counselor_id',
        'session_date',
        'topics_discussed',
        'cunselor_notes',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function counselor()
    {
        return $this->belongsTo(Teacher::class, 'counselor_id');
    }
}
