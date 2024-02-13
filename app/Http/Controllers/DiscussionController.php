<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

}
