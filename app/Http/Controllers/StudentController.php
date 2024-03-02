<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\AssessmentResponse;
use App\Models\Chapter;
use App\Models\Content;
use App\Models\Course;
use App\Models\CourseReview;
use App\Models\Note;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function courses()
    {
        $user = auth()->user();
        $courses = $user->courses;
        return view('students.courses', compact('courses'));
    }

    public function class ($slug)
    {
        $course = Course::where('slug', $slug)->first();

        if (!$course) {
            return redirect()->route('student.courses')->with('error', 'Course not found.');
        }

        // Fetch progress information for the logged-in user
        $user = auth()->user();
        $progress = json_decode($user->courses()->where('courses.id', $course->id)->pluck('progress')->first(), true);

        // Retrieve the current lesson
        $currentLesson = null;
        foreach ($course->chapters as $chapter) {
            foreach ($chapter->contents as $content) {
                if ($content->id == $progress['current_lesson']) {
                    $currentLesson = $content;
                    break 2;
                }
            }
        }

        $currentLessonTitle = $currentLesson ? $currentLesson->title : null;
        $videoUrl = $currentLesson && $currentLesson->content_type == 'lessons' ? $currentLesson->content_path : null;
        $resources = $currentLesson && $currentLesson->content_type == 'resources' ? $currentLesson->resources : null;

        $assessmentDetails = null;

        if ($currentLesson && $currentLesson->content_type == 'quiz') {
            // Fetch assessment details for the current quiz
            $quiz = $currentLesson->quiz_id;
            $assessmentDetails = Assessment::find($quiz);
        }

        // Fetch the description of the current chapter
        $currentChapter = $currentLesson ? $course->chapters->find($currentLesson->chapter_id) : null;
        // Pass the current lesson, current chapter titles, description, progress, quiz, and assessment details to the view
        return view('students.class', compact('course', 'progress', 'currentLesson', 'currentLessonTitle', 'videoUrl', 'resources', 'assessmentDetails', 'currentChapter'));
    }

    public function nextLesson(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->first();
        $user = auth()->user();
        $progress = json_decode($user->courses()->where('courses.id', $course->id)->pluck('progress')->first(), true);

        $currentChapterId = $progress['current_chapter'];
        $currentLessonId = $progress['current_lesson'];

        $currentChapter = Chapter::find($currentChapterId);
        $currentLesson = $currentChapter->contents->where('id', $currentLessonId)->first();

        $nextLesson = null;

        if ($currentLesson) {
            // Check if there are more lessons in the current chapter
            if ($currentChapter->contents->last()->id != $currentLessonId) {
                $nextLesson = $currentChapter->contents->where('id', '>', $currentLessonId)->first();
            } else {
                // Check if there are more chapters
                $nextChapter = $course->chapters->where('id', '>', $currentChapterId)->first();
                if ($nextChapter) {
                    $nextLesson = $nextChapter->contents->first();
                }
            }
        }

        if ($currentLesson && $currentLesson->content_type === 'quiz') {
            // Check if the user has attempted the quiz
            $quizId = $currentLesson->quiz_id; // Assuming quiz_id is the same as lesson_id for quizzes
            $userHasAttempted = AssessmentResponse::where([
                'user_id' => $user->id,
                'assessment_id' => $quizId,
            ])->exists();
    
            if (!$userHasAttempted) {
                // Redirect to the quiz page if the user has not attempted the quiz
                return back()->with('info', 'You must attempt the quiz before moving to the next lesson.');

            }
        }

        if ($nextLesson) {
            // Move to the next lesson and update progress
            $progress['current_lesson'] = $nextLesson->id;

            if ($nextLesson->chapter_id != $currentChapterId) {
                $progress['current_chapter'] = $nextLesson->chapter_id;
                $progress['completed_chapters'][] = $currentChapterId;
            }

            $progress['completed_lessons'][] = $currentLessonId;

            $user->courses()->updateExistingPivot($course->id, ['progress' => json_encode($progress)]);

            $currentChapter = Chapter::find($progress['current_chapter']);
            $currentLesson = $currentChapter->contents->where('id', $progress['current_lesson'])->first();
            $currentChapterTitle = $currentChapter ? $currentChapter->title : 'No Chapter';
            $currentLessonTitle = $currentLesson ? $currentLesson->title : 'No Lesson';

            return redirect()->route('student.course.show', ['slug' => $slug])
                ->with('success', 'Moved to the next lesson.')
                ->with(compact('currentChapterTitle', 'currentLessonTitle'));
        } else {
            // If there are no more lessons, set progress to the first lesson of the first chapter
            $firstChapter = $course->chapters->first();
            $firstLesson = $firstChapter->contents->first();

            $progress['current_chapter'] = $firstChapter->id;
            $progress['current_lesson'] = $firstLesson->id;

            // Add the last chapter and lesson to the completed lists
            $progress['completed_chapters'][] = $currentChapterId;
            $progress['completed_lessons'][] = $currentLessonId;

            $user->courses()->updateExistingPivot($course->id, ['progress' => json_encode($progress)]);

            return redirect()->route('student.course.show', ['slug' => $slug])
                ->with('success', 'All lessons and chapters completed. Moved to the first lesson.');
        }
    }

    public function showLesson($slug, $lessonId)
    {
        $course = Course::where('slug', $slug)->first();

        if (!$course) {
            return redirect()->route('student.courses')->with('error', 'Course not found.');
        }

        $user = auth()->user();
        $progress = json_decode($user->courses()->where('courses.id', $course->id)->pluck('progress')->first(), true);

        $selectedLesson = null;
        foreach ($course->chapters as $chapter) {
            foreach ($chapter->contents as $content) {
                if ($content->id == $lessonId) {
                    $selectedLesson = $content;
                    break 2;
                }
            }
        }

        if (!$selectedLesson) {
            return redirect()->route('student.course.show', ['slug' => $slug])->with('error', 'Lesson not found.');
        }

        // Update progress to the clicked lesson
        $progress['current_chapter'] = $selectedLesson->chapter_id;
        $progress['current_lesson'] = $selectedLesson->id;

        $user->courses()->updateExistingPivot($course->id, ['progress' => json_encode($progress)]);

        $currentChapterTitle = $course->chapters->find($selectedLesson->chapter_id)->title;
        $currentLessonTitle = $selectedLesson->title;
        $videoUrl = $selectedLesson->content_path;

        $contentType = $selectedLesson->content_type;

        
        // Define $currentLesson based on the selected lesson
        $currentLesson = $selectedLesson;
        $currentChapter = $course->chapters->find($selectedLesson->chapter_id);

        $assessmentDetails = null;
        if ($contentType === 'quiz') {
            // Assuming $lessonId is the quiz (assessment) ID
            $assessmentDetails = Assessment::find($lessonId);

            if (!$assessmentDetails) {
                return redirect()->route('student.course.show', ['slug' => $slug])->with('error', 'Quiz not found.');
            }
        }

        // Render the view based on content type
        switch ($contentType) {
            case 'lessons':
                return view('students.class', compact('course', 'progress', 'currentChapterTitle', 'currentLessonTitle', 'videoUrl', 'currentLesson', 'currentChapter'));
            case 'resources':
                // Additional logic for resources content type
                return view('students.class', compact('course', 'progress', 'currentChapterTitle', 'currentLessonTitle', 'videoUrl', 'contentType', 'currentLesson', 'currentChapter'));
            case 'quiz':
                // Additional logic for quiz content type
                return view('students.class', compact('course', 'progress', 'currentChapterTitle', 'currentLessonTitle', 'videoUrl', 'contentType', 'currentLesson', 'currentChapter', 'assessmentDetails'));
            default:
                return redirect()->route('student.course.show', ['slug' => $slug])->with('error', 'Invalid content type.');
        }

    }

    public function saveNote(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'chapterId' => 'required|exists:chapters,id',
            'lessonId' => 'required|exists:contents,id',
        ]);

        // Check if a note already exists for the user, chapter, and lesson
        $existingNote = Note::where([
            'user_id' => Auth::id(),
            'chapter_id' => $request->input('chapterId'),
            'lesson_id' => $request->input('lessonId'),
        ])->first();

        if ($existingNote) {
            // If a note exists, update its content
            $existingNote->update(['content' => $request->input('content')]);
        } else {
            // If no note exists, create a new one
            $note = new Note([
                'content' => $request->input('content'),
                'user_id' => Auth::id(),
                'chapter_id' => $request->input('chapterId'),
                'lesson_id' => $request->input('lessonId'),
            ]);

            $note->save();
        }

        return response()->json(['message' => 'Note saved successfully'], 200);
    }

    public function fetchNotes(Request $request)
    {
        // Get the chapter ID from the request
        $chapterId = $request->input('chapterId');

        // Check if the user has a related course user
        $courseUser = auth()->user()->courseUser;

        // If courseUser is null, set default currentLessonId to null
        $currentLessonId = $courseUser ? $courseUser->progress['current_lesson'] : null;

        // Fetch all lessons with notes for the specified chapter, eager load notes
        $lessonsWithNotes = Content::where('content_type', 'lessons')
            ->where('chapter_id', $chapterId)
            ->with('notes')
            ->get();

        return response()->json([
            'lessonsWithNotes' => $lessonsWithNotes,
            'currentLessonId' => $currentLessonId,
        ]);
    }

    public function deleteNote(Request $request)
    {
        $request->validate([
            'noteId' => 'required|exists:notes,id',
        ]);

        $noteId = $request->input('noteId');

        // Find and delete the note
        $note = Note::findOrFail($noteId);
        $note->delete();

        return response()->json(['message' => 'Note deleted successfully'], 200);
    }

    public function startQuiz(Request $request, $assessmentId)
    {
        $examId = $assessmentId;

        // if (!$request->session()->has('student')) {
        //     return redirect()->route('login')->with('error', 'You are not authorized to take the exam.');
        // }
        // dd($assessmentId);
        $exam = Assessment::find($assessmentId);

        // $now = Carbon::now();
        // $startDateTime = Carbon::parse($exam->start_datetime);
        // $endDateTime = Carbon::parse($exam->end_datetime);

        // if ($now < $startDateTime) {
        //     // Exam has not started yet
        //     return redirect()->back()->with('error', 'The ' . $exam->title . ' has not started yet.');
        // }

        // if ($now > $endDateTime) {
        //     // Exam has ended
        //     return redirect()->back()->with('error', 'The ' . $exam->title . ' has already ended.');
        // }

        $durationInSeconds = $exam->duration;
        $examTitle = $exam->title;

        $numberOfQuestions = $exam->num_questions;
        $questions = Question::where('assessment_id', $assessmentId)->inRandomOrder()->limit($numberOfQuestions)->get();

        $questions = $questions->shuffle();

        $quizData = [];
        foreach ($questions as $index => $question) {
            $options = json_decode($question->options, true);

            shuffle($options);

            $formattedQuestion = [
                'index' => $index + 1,
                'id' => $question->id,
                'question' => $question->question,
                'options' => $options,
            ];

            $quizData[] = $formattedQuestion;
        }

        $quizDataJson = json_encode($quizData);

        return view('students.take_exam', compact('quizDataJson', 'durationInSeconds', 'examId', 'examTitle'));
    }

    public function submitExam(Request $request)
    {
       
        $userResponsesArray = $request->input('responses');
        $examId = (int) $request->examId;

        if (empty($userResponsesArray) || in_array(null, $userResponsesArray, true) || in_array('', $userResponsesArray, true)) {
            return response()->json(['error' => 'Please answer all questions before submitting.']);
        }

        $existingResponse = AssessmentResponse::where([
            'user_id' => auth()->user()->id,
            'assessment_id' => $examId,
        ])->first();

        $exam = Assessment::find($examId);
        $showResult = $exam->show_result;
        $courseSlug = Course::select('id','slug')->where('id',$exam->course_id)->first();
       

        if ($exam->attempt_limit !== 'unlimited' && $existingResponse) {

            if ($existingResponse->attempt_count >= $exam->attempt_limit) {
                return response()->json(['error' => 'You have exceeded the attempt limit for this exam.']);
            }

            AssessmentResponse::where([
                'user_id' => auth()->user()->id,
                'assessment_id' => $examId,
            ])->delete();
        }

        $questionIds = array_keys($userResponsesArray);
        $questions = Question::whereIn('id', $questionIds)->get();
        $correctAnswers = [];
        foreach ($questions as $question) {
            $correctAnswers[$question->id] = $question->correct_answer;
        }

        // Calculate the user's score and save each response
        $score = 0;
        foreach ($userResponsesArray as $questionId => $userAnswer) {
            $isCorrect = isset($correctAnswers[$questionId]) && $userAnswer === $correctAnswers[$questionId];
            $response = new AssessmentResponse([
                'user_id' => auth()->user()->id,
                'assessment_id' => $examId,
                'question_id' => $questionId,
                'response' => $userAnswer,
                'is_correct' => $isCorrect,
                'attempt_count' => $existingResponse ? $existingResponse->attempt_count + 1 : 1,
            ]);
            $response->save();

            if ($isCorrect) {
                $score++;
            }
        }
        $redirectUrl = $showResult === 'yes'
        ? route('cbt.student.exams.result', ['examId' => $examId, 'score' => $score])
        : route('student.course.show', ['slug' => $courseSlug->slug]);

        // return response()->json(['redirect_url' => $redirectUrl]);

        return response()->json(['redirect_url' => $redirectUrl, 'success' => 'Quiz submitted successfully!']);


    }

    public function submitReview(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);
        // Check if the rating is not empty
        if ($validatedData['rating'] == 0) {
            return response()->json(['error' => 'Rating cannot be empty.'], 422);
        }

        // Get the currently authenticated user
        $user = Auth::user();

        // Create a new course review
        $review = new CourseReview();
        $review->user_id = $user->id;
        $review->course_id = $request->course_id;
        $review->rating = $validatedData['rating'];
        $review->review = $validatedData['review'];
        
        // Save the review
        $review->save();

        // Optionally, return a success response
        return response()->json(['message' => 'Review submitted successfully']);
    }

    public function fetchReviews(Request $request)
    {
        // Retrieve the offset and limit from the request
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 2); // Default limit is 5
    
        // Fetch reviews from the database using the offset and limit
        $reviews = CourseReview::with('user') // Eager load the user relationship
                        ->orderBy('created_at', 'desc')
                        ->skip($offset)
                        ->take($limit)
                        ->get();
    
        // If no reviews are fetched, return an empty response
        if ($reviews->isEmpty()) {
            return response()->json([]);
        }
    
        // Increment the offset for the next fetch
        $nextOffset = $offset + $limit;
    
        // Transform reviews data to include user's name and picture
        $transformedReviews = $reviews->map(function ($review) {
            return [
                'content' => $review->review,
                'rating' => $review->rating,
                'user_name' => $review->user->name, // Access user's name from the user relationship
                'user_picture' => $review->user->profile_image, // Access user's picture from the user relationship
            ];
        });
    
        // Return the transformed reviews along with the next offset as JSON response
        return response()->json(['reviews' => $transformedReviews, 'next_offset' => $nextOffset]);
    }
    
}
