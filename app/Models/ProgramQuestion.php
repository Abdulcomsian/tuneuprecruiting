<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'label',
        'type',
        'answer'
    ];
}
