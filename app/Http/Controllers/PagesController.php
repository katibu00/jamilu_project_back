<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\PaystackAPIKey;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home()
    {
        $featuredCourses = Course::where('published', true)
                                ->where('featured', true)
                                ->orderBy('created_at', 'desc')
                                ->take(3)
                                ->get();
        
        return view('landing.pages.home', compact('featuredCourses'));
    }

    public function couraseDetail($slug)
    {
        // dd(12);
        $course = Course::with(['instructor', 'chapters' => function ($query) {
            // Order chapters by their order_number
            $query->orderBy('order_number');
    
            // Load contents for each chapter and order them by order_number
            $query->with(['contents' => function ($contentQuery) {
                $contentQuery->orderBy('order_number');
            }]);
        }])
        ->where('slug', $slug)
        ->first();
    
        $lessonCount = $course->lessonCount();
        $quizCount = $course->quizCount();
        $resourceCount = $course->resourceCount();
    
        return view('guest.course_detail', compact('course', 'lessonCount', 'quizCount', 'resourceCount'));
    }


    public function careers()
    {
        // Logic for the main careers listing page
        return view('landing.pages.careers');
    }

    public function webDevelopment()
    {
        // Logic for the web development career page
        return view('landing.pages.web-development');
    }





    public function courseDetail($slug)
    {
        // Fetch the course with eager loading for related data
        $course = Course::with([
            'instructor', // Changed from 'instructor.user'
            'chapters' => function($query) {
                $query->orderBy('order_number');
            },
            'chapters.contents' => function($query) {
                $query->orderBy('order_number');
            }
        ])->where('slug', $slug)->firstOrFail();
        
        // Get related courses (you can modify this logic based on your requirements)
        $relatedCourses = Course::where('id', '!=', $course->id)
                                ->where(function($query) use ($course) {
                                    $query->where('level', $course->level)
                                        ->orWhere('language', $course->language);
                                })
                                ->where('published', true)
                                ->limit(3)
                                ->get();
        
        // Calculate some statistics
        $totalLessons = 0;
        $totalDuration = 0;
        
        foreach ($course->chapters as $chapter) {
            $totalLessons += $chapter->contents->count();
            $totalDuration += $chapter->contents->sum('duration');
        }
        
        return view('guest.course_detail', compact('course', 'relatedCourses', 'totalLessons', 'totalDuration'));
    }
    

    public function buy($slug)
    {
        if (!Auth::check()) {
            return redirect()->route('login', ['return_to' => route('course.buy', ['slug' => $slug], false)])
                ->with('error', 'Please log in to continue your transaction.');
        }
        $publicKey = PaystackAPIKey::first()->public_key ?? '';

        $course = Course::where('slug',$slug)->first();
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->reservedAccounts()->exists() && $user->wallet) {
                $userReservedAccounts = $user->reservedAccounts;
                $userWalletBalance = $user->wallet->balance;
                return view('guest.buy_now', compact('course', 'userReservedAccounts', 'userWalletBalance','publicKey'));
            }
        }
    }


    public function buyProcess($slug)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login', ['return_to' => route('course.buy', ['slug' => $slug], false)])
                ->with('error', 'Please log in to continue your transaction.');
        }
    
        // Retrieve the course based on the provided slug
        $course = Course::where('slug', $slug)->first();
    
        // Check if the user has already purchased the course
        $user = auth()->user();
        if ($user->courses->contains($course)) {
            return redirect()->back()->with('error', 'You have already purchased this course.');
        }
    
        $userWalletBalance = $user->wallet->balance;
        $coursePrice = $course->is_free ? 0 : ($course->has_discount ? $course->discount_price : $course->price);
    
        if ($userWalletBalance < $coursePrice) {
            return redirect()->back()->with('error', 'Insufficient wallet balance to purchase this course.');
        }
    
        // Find the ID of the first chapter and first lesson of the course
        $firstChapter = $course->chapters->first();
        $firstLesson = $firstChapter ? $firstChapter->contents->first() : null;
    
        // If all checks pass, proceed with the purchase
        $progress = [
            'current_chapter' => $firstChapter ? $firstChapter->id : null,
            'completed_chapters' => [],
            'current_lesson' => $firstLesson ? $firstLesson->id : null,
            'completed_lessons' => [],
            'completion_dates' => [] 
        ];
    
        $user->courses()->attach($course, ['progress' => json_encode($progress)]);
    
        $user->wallet->update(['balance' => $userWalletBalance - $coursePrice]);
    
        return redirect()->route('student.courses')->with('success', 'Course purchased successfully!');
    }
    
    
}
