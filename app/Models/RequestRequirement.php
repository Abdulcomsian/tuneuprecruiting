<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestRequirement extends Model
{
    protected $fillable = [
        'apply_id',
        'custom_fields'
    ];
    use HasFactory;
}
