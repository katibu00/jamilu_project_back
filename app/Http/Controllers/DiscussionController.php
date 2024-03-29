<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'content' => 'required',
        ]);

        // Create a new discussion
        $discussion = Discussion::create([
            'course_id' => $request->course_id,
            'user_id' => auth()->user()->id,
            'content' => $request->content,
        ]);

        return response()->json(['message' => 'Discussion posted successfully', 'discussion' => $discussion]);
    }

    public function index($course_id)
    {
        $discussions = Discussion::with('user', 'comments.user')->where('course_id', $course_id)->get();
    
        return response()->json(['discussions' => $discussions]);
    } 

    public function commentStore(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'discussion_id' => 'required|exists:discussions,id',
            'content' => 'required|string',
            // Add any additional validation rules as needed
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->user_id = auth()->user()->id; // Assuming you are using authentication
        $comment->discussion_id = $request->input('discussion_id');
        $comment->content = $request->input('content');
        // Add any additional fields as needed
        $comment->save();

        // You may also choose to return the created comment if needed
        return response()->json(['message' => 'Comment created successfully', 'comment' => $comment]);
    }



    public function instructorIndex(Request $request)
    {
        $courses = Course::where('instructor_id', auth()->user()->id)->get();
        $selectedCourse = null;
        $discussions = null;
    
        if ($request->filled('course_slug')) {
            $selectedCourse = Course::where('slug', $request->course_slug)->firstOrFail();
            $discussions = Discussion::where('course_id', $selectedCourse->id)->with('comments')->latest()->paginate(10);
        }
    
        return view('instructors.discussions.index', compact('courses', 'selectedCourse', 'discussions'));
    }

    public function delete(Discussion $discussion)
    {
        // Check if the current user is the instructor of the course associated with the discussion
        if (auth()->user()->id !== $discussion->course->instructor_id) {
            return back()->with('error', 'You are not authorized to delete this discussion.');
        }

        // Perform deletion
        $discussion->delete();

        return redirect()->back()->with('success', 'Discussion deleted successfully.');
    }
}
