<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    public function questions()
    {
        return $this->hasMany(Question::class,'assessment_id','id');
    }
}
