<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'coach_id',
        'student_id',
        'sender',
        'admin_id'
    ];

    public function apply()
    {
        return $this->belongsTo(Apply::class);
    }
}
