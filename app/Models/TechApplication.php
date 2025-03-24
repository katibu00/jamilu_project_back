<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'skills_interested',
        'experience_level',
        'learning_preference',
        'language_preference',
        'device_preference',
        'learning_goal',
        'course_format_preference',
        'price_range',
        'interested_in_mentorship',
        'interested_in_certification',
        'joined_whatsapp'
    ];

    protected $casts = [
        'skills_interested' => 'array',
        'interested_in_mentorship' => 'boolean',
        'interested_in_certification' => 'boolean',
        'joined_whatsapp' => 'boolean',
    ];
}