<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInfoOrDemo extends Model
{
    protected $fillable = [
        'university_name',
        'email',
        'college_or_university',
        'info',
        'status',
        'read'
    ];
    use HasFactory;
}
