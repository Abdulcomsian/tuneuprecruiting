<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $table = 'universities';

    protected $fillable = [
        'coach_id',
        'name'
    ];

    public function coach()
    {
        return $this->belongsTo(CoachFinal::class, 'coach_id');
    }
}
