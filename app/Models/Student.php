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
        'preferred_name',
        'home_phone_number',
        'mobile_number',
        'graduation_year',
        'birth_date',
        'are_u_from_usa',
        'country',
        'state',
        'primary_address',
        'guardians_name',
        'guardians_phone_number',
        'program_type',
        'gender',
        'high_school_name',
        'registered_with_ncaa',
        'ncaa_id',
        'gpa',
        'sat_test_date',
        'sat_reading',
        'sat_writing',
        'sat_math',
        'sat_total',
        'act_test_date',
        'act_sum_score',
        'act_composite',
        'act_english',
        'act_math',
        'act_total',
        'act_total',
        'home_town',
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
