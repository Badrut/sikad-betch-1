<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'student_id',
        'report_type',
        'title',
        'description',
        'status',
        'handled_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function handler()
    {
        return $this->belongsTo(Teacher::class, 'handled_by');
    }
}
