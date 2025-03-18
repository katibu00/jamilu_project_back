<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'instructor_id',
        'short_description',
        'description',
        'level',
        'language',
        'featured',
        'is_free',
        'price',
        'discount_price',
        'has_discount',
        'featured_video',
        'thumbnail',
        'tags',
        'duration_minutes',
        'published',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'is_free' => 'boolean',
        'has_discount' => 'boolean',
        'published' => 'boolean',
        'tags' => 'array',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
    ];

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

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
