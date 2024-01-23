<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAdditionalRequirement extends Model
{
    protected $fillable = [
        'apply_id',
        'request_requirement_id',
        'label',
        'type',
        'answer',
    ];
    use HasFactory;
}
