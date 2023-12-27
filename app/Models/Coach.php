<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'about_me',
        'website',
        'profile_image',
        'short_video',
        'gender',
        'college_or_university',
        'program_type',
    ];

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
