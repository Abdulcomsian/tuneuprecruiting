<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * Get the attachments for the student.
     */
    public function attachments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentAttachments::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_students', 'student_id','user_id');
    }
}
