<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['chapter_id', 'quiz_id', 'content_type', 'title', 'content_path', 'duration', 'order_number'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'lesson_id');
    }

}
