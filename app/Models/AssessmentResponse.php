<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'assessment_id',
        'question_id',
        'response',
        'is_correct',
        'attempt_count',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
