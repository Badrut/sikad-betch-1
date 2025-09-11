<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtracurricularDispensation extends Model
{
    protected $fillable = [
        'student_id',
        'start_date',
        'end_date',
        'reason',
        'status',
        'approved_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function approver()
    {
        return $this->belongsTo(Teacher::class, 'approved_by');
    }
}
