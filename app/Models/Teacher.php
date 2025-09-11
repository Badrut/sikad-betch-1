<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'nip',
        'user_id',
        'gender',
        'is_active',
        'is_homeroom_teacher',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
