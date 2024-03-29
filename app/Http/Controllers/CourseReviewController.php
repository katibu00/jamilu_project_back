<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseReview;
use Illuminate\Http\Request;

class CourseReviewController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::where('instructor_id', auth()->user()->id)->get();
        $selectedCourse = null;
        $courseReviews = null;
    
        if ($request->filled('course_slug')) {
            $selectedCourse = Course::where('slug', $request->course_slug)->firstOrFail();
            $courseReviews = CourseReview::where('course_id', $selectedCourse->id)->latest()->paginate(10);
        }
    
        return view('instructors.reviews.index', compact('courses', 'selectedCourse', 'courseReviews'));
    }


    public function togglePublish(CourseReview $review)
    {
        // Check if the user is authorized to toggle publish status (e.g., instructor)
        // Add your authorization logic here
        
        // Toggle publish status
        $review->update(['published' => !$review->published]);

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Review publish status toggled successfully.');
    }
}
