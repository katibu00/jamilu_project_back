<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Chapter;
use App\Models\Content;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CourseContentController extends Controller
{
    public function manageContent($courseId)
    {
        $course = Course::find($courseId);

        if (!$course) {
            return redirect()->route('error');
        }
        $quizzes = Assessment::where('instructor_id', auth()->user()->id)->get();

        return view('instructor.courses.content', ['course' => $course, 'quizzes' => $quizzes]);
    }

    public function sav99eContent(Request $request, $courseId)
    {
        // dd($request->all());

        try {
            $request->validate([
                'chapters' => 'required|array|min:1',
                'chapters.*.title' => 'required|string|max:255',
                'chapters.*.description' => 'required|string',
                'chapters.*.order' => 'required|integer',
                'chapters.*.lessons' => 'array',
                'chapters.*.lessons.*.title' => 'required|string|max:255',
                'chapters.*.lessons.*.duration' => 'required|numeric',
                'chapters.*.lessons.*.order' => 'required|integer',
                'chapters.*.quizzes' => 'array',
                'chapters.*.quizzes.*.title' => 'required|string|max:255',
                'chapters.*.quizzes.*.order' => 'required|integer',
                'chapters.*.quizzes.*.quiz_id' => 'required', // Adjust the table name as needed
                'chapters.*.resources' => 'array',
                'chapters.*.resources.*.title' => 'required|string|max:255',
                'chapters.*.resources.*.file' => 'required|file|mimes:pdf,doc,docx', // Add allowed file types
                'chapters.*.resources.*.order' => 'required|integer',
            ]);
        } catch (ValidationException $e) {
            // Validation failed
            $errors = $e->validator->errors()->toArray();
            return response()->json(['message' => 'Validation failed', 'errors' => $errors], 422);
        }

        // Find the course by ID
        $course = Course::findOrFail($courseId);

        // Loop through each chapter in the request and save to the database
        foreach ($request->input('chapters') as $chapterData) {
            $chapter = $course->chapters()->create([
                'title' => $chapterData['title'],
                'description' => $chapterData['description'],
                'order_number' => $chapterData['order'],
            ]);
    
            // Save lessons, quizzes, and resources for the current chapter
            $this->saveItems($chapter, 'lessons', $chapterData);
            $this->saveItems($chapter, 'quizzes', $chapterData);
            $this->saveItems($chapter, 'resources', $chapterData);
        }

        return response()->json(['message' => 'Content saved successfully']);
    }
    private function saveItems($chapter, $type, $request)
    {
        if (!isset($request[$type]) || empty($request[$type])) {
            return; // No items for this type in the current chapter
        }
    
        foreach ($request[$type] as $itemData) {
            $item = new Content([
                'title' => $itemData['title'],
                'order_number' => isset($itemData['order']) ? $itemData['order'] : null,
                'chapter_id' => $chapter->id,
            ]);
    
            // Additional attributes based on the type
            switch ($type) {
                case 'lessons':
                    $item->duration = $itemData['duration'];
                    $item->content_type = 'lessons';
                    break;
    
                case 'quizzes':
                    $item->quiz_id = $itemData['quiz_id'];
                    $item->content_type = 'quiz';
                    break;
    
                case 'resources':
                    // Assuming resources are stored differently, adjust accordingly
                    $file = $itemData['file'];
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads'), $filename);
                    $item->content_path = 'uploads/' . $filename;
                    $item->content_type = 'resources';
                    break;
            }
    
            $item->save();
        }
    }
    



    public function saveContent(Request $request, Course $course)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'chapters' => 'required|array',
            'chapters.*.title' => 'required|string|max:255',
            'chapters.*.order' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();
            
            // Process each chapter
            foreach ($request->chapters as $chapterData) {
                // Create or update chapter
                $chapter = Chapter::create([
                    'course_id' => $course->id,
                    'title' => $chapterData['title'],
                    'description' => $chapterData['description'] ?? null,
                    'order_number' => $chapterData['order'],
                    // Default values for is_free and published
                    'is_free' => false,
                    'published' => true,
                ]);
                
                // Process lessons if they exist
                if (isset($chapterData['lessons']) && is_array($chapterData['lessons'])) {
                    foreach ($chapterData['lessons'] as $lessonData) {
                        // Calculate duration in decimal hours
                        $hours = isset($lessonData['hours']) ? intval($lessonData['hours']) : 0;
                        $minutes = isset($lessonData['minutes']) ? intval($lessonData['minutes']) : 0;
                        $seconds = isset($lessonData['seconds']) ? intval($lessonData['seconds']) : 0;
                        
                        // Convert to decimal hours (e.g., 1h 30m = 1.50)
                        $duration = $hours + ($minutes / 60) + ($seconds / 3600);
                        
                        // Create lesson content
                        Content::create([
                            'chapter_id' => $chapter->id,
                            'content_type' => 'lesson',
                            'title' => $lessonData['title'],
                            'content_path' => $lessonData['video_url'] ?? null,
                            'duration' => $duration,
                            'order_number' => $lessonData['order'],
                        ]);
                    }
                }
                
                // Process quizzes if they exist
                if (isset($chapterData['quizzes']) && is_array($chapterData['quizzes'])) {
                    foreach ($chapterData['quizzes'] as $quizData) {
                        Content::create([
                            'chapter_id' => $chapter->id,
                            'quiz_id' => $quizData['quiz_id'],
                            'content_type' => 'quiz',
                            'title' => $quizData['title'],
                            'order_number' => $quizData['order'],
                        ]);
                    }
                }
                
                // Process resources if they exist
                if (isset($chapterData['resources']) && is_array($chapterData['resources'])) {
                    foreach ($chapterData['resources'] as $resourceData) {
                        // Handle file upload
                        $filePath = null;
                        if (isset($resourceData['file']) && $resourceData['file']->isValid()) {
                            $file = $resourceData['file'];
                            $fileName = time() . '_' . $file->getClientOriginalName();
                            $filePath = $file->storeAs('course_resources', $fileName, 'public');
                        }
                        
                        // Create resource content
                        Content::create([
                            'chapter_id' => $chapter->id,
                            'content_type' => 'resources',
                            'title' => $resourceData['title'],
                            'content_path' => $filePath,
                            'order_number' => $resourceData['order'],
                        ]);
                    }
                }
            }
            
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Course content saved successfully'], 200);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Failed to save course content: ' . $e->getMessage()], 500);
        }
    }
    
    /**
     * Helper method to ensure unique order numbers
     * 
     * @param int $chapterId
     * @param int $requestedOrder
     * @return int
     */
    private function getUniqueOrderNumber($chapterId, $requestedOrder)
    {
        // Check if the order number already exists
        $exists = Content::where('chapter_id', $chapterId)
                         ->where('order_number', $requestedOrder)
                         ->exists();
        
        if (!$exists) {
            return $requestedOrder;
        }
        
        // Find the next available order number
        $maxOrder = Content::where('chapter_id', $chapterId)->max('order_number');
        return $maxOrder + 1;
    }







    public function edit($id)
    {
        $course = Course::with(['chapters' => function ($query) {
            $query->orderBy('order_number');
            $query->with(['contents' => function ($contentQuery) {
                $contentQuery->orderBy('order_number');
            }]);
        }])
        ->findOrFail($id);
        $quizzes = Assessment::where('instructor_id', auth()->user()->id)->get();
    
        return view('instructors.courses.edit_contents', compact('course','quizzes'));
    }
    
    public function addLesson(Request $request)
    {

        $request->validate([
            'chapter_id' => 'required|exists:chapters,id',
            'lesson_title' => 'required|string|max:255',
            'duration' => 'required|numeric',
            'lesson_order' => 'required|integer',
        ]);

        $lesson = new Content([
            'chapter_id' => $request->input('chapter_id'),
            'title' => $request->input('lesson_title'),
            'content_type' => 'lessons',
            'duration' => $request->input('duration'),
            'order_number' => $request->input('lesson_order'),
        ]);

        $lesson->save();

        return redirect()->back()->with('Lesson saved successfully');

    }

    public function addQuiz(Request $request)
    {
        $request->validate([
            'quiz_title' => 'required|string|max:255',
            'quiz_order' => 'required|integer',
            'quiz_id' => 'required',
        ]);

        $quiz = new Content([
            'title' => $request->input('quiz_title'),
            'order_number' => $request->input('quiz_order'),
            'quiz_id' => $request->input('quiz_id'),
            'content_type' => 'quiz',
            'chapter_id' => $request->input('chapter_id'),
        ]);

        $quiz->save();

        return redirect()->back()->with('success', 'Quiz added successfully');
    }

    public function addResources(Request $request)
    {
        $request->validate([
            'chapter_id' => 'required|exists:chapters,id',
            'resource_title' => 'required|string|max:255',
            'resource_file' => 'required|file|mimes:pdf,doc,docx', // Add allowed file types
            'resource_order' => 'required|integer',
        ]);

        // Assuming Resource is an Eloquent model for your resources
        $resource = new Content([
            'title' => $request->input('resource_title'),
            'order_number' => $request->input('resource_order'),
            'chapter_id' => $request->input('chapter_id'),
            'content_type' => 'resources',

        ]);

        // Handle file upload
        $file = $request->file('resource_file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $resource->content_path = 'uploads/' . $filename;

        $resource->save();

        return redirect()->back()->with('success', 'Resource added successfully');
    }

    public function updateLesson(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'contentId' => 'required|exists:contents,id',
            'editedTitle' => 'required|string|max:255',
            'editedDuration' => 'required|string',
            'editedOrder' => 'required|integer', 
        ]);

        // Find the lesson by contentId
        $lesson = Content::find($validatedData['contentId']);

        // Update lesson details
        $lesson->title = $validatedData['editedTitle'];
        $lesson->duration = $validatedData['editedDuration'];
        $lesson->order_number = $validatedData['editedOrder']; // Update the order number

        // Save the updated lesson
        $lesson->save();

        // You can redirect back to the page or return a response as needed
        return redirect()->back()->with('success', 'Lesson updated successfully');
    }

    public function updateQuiz(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'contentId' => 'required|exists:contents,id',
            'editedTitle' => 'required|string|max:255',
            'editedOrder' => 'required|integer',
        ]);

        // Find the quiz by contentId
        $quiz = Content::find($validatedData['contentId']);

        // Update quiz details
        $quiz->title = $validatedData['editedTitle'];
        $quiz->order_number = $validatedData['editedOrder'];

        // Save the updated quiz
        $quiz->save();

        // You can redirect back to the page or return a response as needed
        return redirect()->back()->with('success', 'Quiz updated successfully');
    }

    public function updateResource(Request $request)
    {
        $validatedData = $request->validate([
            'contentId' => 'required|exists:contents,id',
            'editedResourceTitle' => 'required|string|max:255',
            'editedResourceFile' => 'nullable|mimes:pdf,doc,docx',
            'editedResourceOrder' => 'required|integer',
        ]);

        $resource = Content::find($validatedData['contentId']);
        $resource->title = $validatedData['editedResourceTitle'];
        $resource->order_number = $validatedData['editedResourceOrder'];

        if ($request->hasFile('editedResourceFile')) {
            // Handle file upload logic here and update the file path in the database
            // Example: $resource->file_path = $request->file('editedResourceFile')->store('resources');
        }

        $resource->save();

        return redirect()->back()->with('success', 'Resource updated successfully');
    }

    public function updateChapter(Request $request)
    {
        $validatedData = $request->validate([
            'chapterId' => 'required|exists:chapters,id',
            'chapterTitle' => 'required|string|max:255',
            'chapterDescription' => 'nullable|string',
            'chapterOrder' => 'required|integer',
        ]);

        $chapter = Chapter::find($validatedData['chapterId']);
        $chapter->title = $validatedData['chapterTitle'];
        $chapter->description = $validatedData['chapterDescription'];
        $chapter->order_number = $validatedData['chapterOrder'];
        $chapter->save();

        return redirect()->back()->with('success', 'Chapter updated successfully');
    }

    public function deleteContent(Request $request)
    {
        if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'instructor')) {
            $request->validate([
                'contentId' => 'required|exists:contents,id',
            ]);
            $content = Content::find($request->input('contentId'));
            $content->delete();

            return redirect()->back()->with('success', 'Content deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
    }

}
