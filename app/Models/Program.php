<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'program_name',
        'number_of_students',
        'session',
        'status',
        'details',
        'video',
        'program_type',
        'program_for',
        'custom_fields'
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
