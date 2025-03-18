<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'bio',
        'expertise',
        'qualification',
        'about',
        'linkedin_url',
        'website_url',
        'rating',
        'total_students',
        'total_courses',
        'is_verified',
        'is_featured',
    ];

    /**
     * Get the user that owns the instructor profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the courses for the instructor.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Check if the instructor profile is complete.
     */
    public function isProfileComplete()
    {
        return !empty($this->bio) && 
               !empty($this->expertise) && 
               !empty($this->qualification) && 
               !empty($this->about);
    }
}