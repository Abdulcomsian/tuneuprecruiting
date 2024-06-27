<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachFinal extends Model
{
    use HasFactory;

    protected $table = "coaches_final";


    public function university(){
        return $this->belongsTo(University::class, 'university_id');
    }
}
