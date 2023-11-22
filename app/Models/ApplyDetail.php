<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'apply_id',
        'label',
        'answer',
        'type'
    ];
}
