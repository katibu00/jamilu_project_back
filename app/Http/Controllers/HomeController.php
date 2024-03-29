<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    // use App\Models\Course;

public function instructor()
{
    $user = auth()->user(); // Get the authenticated user (instructor)

    // Fetch total courses created by the instructor
    $totalCourses = Course::where('instructor_id', $user->id)->count();

    // Fetch total revenue earned from all courses created by the instructor
    $totalRevenue = 0;

    // Fetch list of courses created by the instructor
    $courses = Course::where('instructor_id', $user->id)->get();

    // Calculate total enrollments by summing enrollments associated with each course
    $totalEnrollments = 0;
    foreach ($courses as $course) {
        $totalEnrollments += DB::table('course_user')
            ->where('course_id', $course->id)
            ->count();
    }

    // Pass the data to the view
    return view('instructors.index')->with([
        'totalCourses' => $totalCourses,
        'totalEnrollments' => $totalEnrollments,
        'totalRevenue' => $totalRevenue,
        'courses' => $courses,
    ]);
}

    
    
    
    public function student()
    {
        return view('students.home');
    }
}
