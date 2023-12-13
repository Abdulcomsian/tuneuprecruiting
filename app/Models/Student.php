<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'graduation_year',
        'home_town',
        'state',
        'country',
        'academic_honors',
        'birth_date',
        'class_rank',
        'college',
        'core_gpa',
        'gpa',
        'gender',
        'grad_year',
        'height',
        'home_phone',
        'interest_level',
    ];

    /**
     * Get the attachments for the student.
     */
    public function attachments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentAttachments::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
