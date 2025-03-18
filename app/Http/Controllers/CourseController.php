<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('instructor_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        $activeCoursesCount = Course::where('instructor_id', Auth::id())
            ->where('published', true)
            ->count();
            
        $totalStudents = 0; // You may need to implement this based on your enrollment model
        
        $averageRating = 0; // You may need to implement this based on your rating model
        
        return view('instructor.courses.index', compact('courses', 'activeCoursesCount', 'totalStudents', 'averageRating'));
    }

    /**
     * Show the form for creating a new course.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created course in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'level' => 'required|in:beginner,intermediate,advanced,all-levels',
            'language' => 'required|in:english,hausa',
            'is_free' => 'sometimes', // No boolean validation since it's "on" or absent
            'price' => 'nullable|required_if:is_free,false|numeric|min:0',
            'has_discount' => 'sometimes',
            'discount_price' => 'nullable|required_if:has_discount,true|numeric|min:0|lt:price',
            'duration_minutes' => 'nullable|integer|min:1',
            'is_featured' => 'sometimes',
            'published' => 'sometimes',
            'tags' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_video' => 'nullable|string|url',
        ]);
    
        // Generate unique slug from title
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
    
        while (Course::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
    
        // Process thumbnail if uploaded
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('courses/thumbnails', 'public');
        }
    
        // Process tags
        $tags = [];
        if ($request->filled('tags')) {
            $tagArray = array_map('trim', explode(',', $request->tags));
            $tags = array_filter($tagArray);
        }
    
        // Convert checkboxes: If present, it's true; if absent, it's false
        $isFree = $request->has('is_free'); // "on" => true, absent => false
        $isFeatured = $request->has('is_featured');
        $hasDiscount = $request->has('has_discount') && !$isFree;
        $published = $request->has('published');
    
        // Create course
        $course = new Course([
            'title' => $request->title,
            'slug' => $slug,
            'instructor_id' => Auth::id(),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'level' => $request->level,
            'language' => $request->language,
            'featured' => $isFeatured,
            'is_free' => $isFree,
            'price' => $isFree ? null : $request->price,
            'has_discount' => $hasDiscount,
            'discount_price' => $hasDiscount ? $request->discount_price : null,
            'featured_video' => $request->featured_video,
            'thumbnail' => $thumbnailPath,
            'tags' => json_encode($tags),
            'duration_minutes' => $request->duration_minutes,
            'published' => $published,
        ]);
    
        $course->save();
    
        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully!');
    }
    
    /**
     * Display the specified course.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        // Check if user has access to this course
        if ($course->instructor_id !== Auth::id() && !Auth::user()->hasRole('admin')) {
            abort(403);
        }

        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified course.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        // Check if user has access to edit this course
        if ($course->instructor_id !== Auth::id() && !Auth::user()->hasRole('admin')) {
            abort(403);
        }

        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified course in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        // Check if user has access to update this course
        if ($course->instructor_id !== Auth::id() && !Auth::user()->hasRole('admin')) {
            abort(403);
        }

        // Similar validation to store method
        // Update course logic...

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified course from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        // Check if user has access to delete this course
        if ($course->instructor_id !== Auth::id() && !Auth::user()->hasRole('admin')) {
            abort(403);
        }

        // Delete thumbnail if exists
        if ($course->thumbnail) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}