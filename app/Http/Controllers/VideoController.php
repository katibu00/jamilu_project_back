<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use App\Models\Content; 

class VideoController extends Controller
{

     /**
     * @return Application|Factory|View
     */
    public function index($courseId)
    {
        $user = Auth::user();
        $course = $user->courses()->findOrFail($courseId);
    
        $chapters = $course->chapters()->with(['contents' => function ($query) {
            $query->where('content_type', 'lessons');
        }])->get();
    
        $lessons = $course->lessons()->where('content_type', 'lessons')->get();
    
        return view('instructors.videos.index', compact('chapters', 'lessons'));
    }



public function uploadLargeFiles(Request $request) {
    $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

    if (!$receiver->isUploaded()) {
        // File not uploaded
    }

    $fileReceived = $receiver->receive(); // Receive file
    if ($fileReceived->isFinished()) { // File uploading is complete / all chunks are uploaded
        $file = $fileReceived->getFile(); // Get file
        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $extension; // Generate a unique filename using uniqid()

        $disk = Storage::disk(config('filesystems.default'));
        $path = $disk->putFileAs('public/videos', $file, $fileName);

        // Delete chunked file
        unlink($file->getPathname());

        // Update content_path in the Content model
        $lessonId = $request->input('lesson_id'); // Get the lesson ID from the request
        $content = Content::find($lessonId); // Find the Content row by lesson ID
        if ($content) {
            // Update content_path attribute with the uploaded file path (excluding 'public')
            $content->content_path = 'storage/videos/' . $fileName;
            $content->save();
        }

        return [
            'path' => asset('storage/videos/' . $fileName), // Include 'public' in the URL for access from the web
            'filename' => $fileName
        ];
    }

    // Otherwise return percentage information
    $handler = $fileReceived->handler();
    return [
        'done' => $handler->getPercentageDone(),
        'status' => true
    ];
}



public function create(Request $request)
    {
        $lessonId = $request->query('lesson_id'); // Retrieve the lesson ID from the query parameter
        $lesson = Content::find($lessonId); // Fetch the lesson based on the ID

        // Pass the lesson data to the view
        return view('instructors.videos.create', compact('lesson'));
    }



}
