<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'instructor_id', 'price'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(Content::class, Chapter::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class,'instructor_id');
    }

    public function lessonCount()
    {
        return $this->chapters->flatMap(function ($chapter) {
            return $chapter->contents->where('content_type', 'lessons');
        })->count();
    }

    public function quizCount()
    {
        return $this->chapters->flatMap(function ($chapter) {
            return $chapter->contents->where('content_type', 'quiz');
        })->count();
    }

    public function resourceCount()
    {
        return $this->chapters->flatMap(function ($chapter) {
            return $chapter->contents->where('content_type', 'resources');
        })->count();
    }


    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('progress') // Include the progress column from the pivot table
                    ->withTimestamps();
    }
}
