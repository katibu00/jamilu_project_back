<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\AssessmentResponse;


class EnrollmentsController extends Controller
{

    public function index(Request $request)
    {
        $courses = Course::where('instructor_id', auth()->user()->id)->get();
        $enrollments = null;
        $selectedCourse = null;
    
        if ($request->filled('course_slug')) {
            $selectedCourse = Course::where('slug', $request->course_slug)->firstOrFail();
            $enrollments = $selectedCourse->users()->withPivot('progress')->get();
    
            // Fetch all assessments for the selected course
            $assessments = Assessment::where('course_id', $selectedCourse->id)->get();
    
            foreach ($enrollments as $enrollment) {
                $progressData = json_decode($enrollment->pivot->progress, true);
                $totalLessons = count($progressData['completed_lessons']);
                $totalLessonsInCourse = $selectedCourse->lessons()->count();
                $progressPercentage = $totalLessons > 0 ? round(($totalLessons / $totalLessonsInCourse) * 100) : 0;
                $enrollment->progressPercentage = $progressPercentage;
    
                // Pass assessments to the view
                $enrollment->assessments = $assessments;
            }
        }
    
        return view('instructors.enrollments.index', compact('courses', 'enrollments', 'selectedCourse'));
    }
    

    public function fetchStudentProgress($studentId, $courseId)
    {
        // Fetch the student
        $student = User::findOrFail($studentId);

        // Fetch the course
        $course = Course::findOrFail($courseId);

        // Check if the student is enrolled in the specified course
        if (!$student->courses->contains($course)) {
            return response()->json(['error' => 'Student is not enrolled in this course.'], 404);
        }

        // Fetch the progress data for the specified course
        $progressData = $student->courses()->where('course_id', $courseId)->first()->pivot->progress;

        // Convert progress data JSON string to array
        $progressDataArray = json_decode($progressData, true);

        // Fetch titles and content types of completed lessons
        $completedLessonsData = [];
        foreach ($progressDataArray['completed_lessons'] as $lessonId) {
            $lesson = Content::findOrFail($lessonId);
            $completedLessonsData[] = [
                'lesson_id' => $lessonId,
                'title' => $lesson->title,
                'content_type' => $lesson->content_type,
            ];
        }

        // Fetch the timestamp when the course was purchased by the user
        $coursePurchaseDate = $student->courses()->where('course_id', $courseId)->first()->pivot->created_at;

        // Combine progress data, completed lessons data, and course purchase date
        $progressWithLessonData = [
            'progress_data' => $progressDataArray,
            'completed_lessons_data' => $completedLessonsData,
            'purchase_date' => $coursePurchaseDate,
        ];

        // Return the combined data as JSON response
        return response()->json(['data' => $progressWithLessonData]);
    }






public function fetchAssessmentScore(Request $request)
{
    // Retrieve assessment ID and user ID from the request
    $userId = $request->input('userId');
    $assessmentId = $request->input('assessmentId');

    try {
        // Fetch assessment details
        $assessment = Assessment::findOrFail($assessmentId);

        // Fetch user's responses for the assessment
        $responses = AssessmentResponse::where('assessment_id', $assessmentId)
                                        ->where('user_id', $userId)
                                        ->with('question')
                                        ->get();

        // Calculate scores and other necessary data
        $totalQuestions = $assessment->questions->count();
        $totalAttempted = $responses->count();
        $totalCorrect = $responses->where('is_correct', true)->count();
        $totalFailed = $totalAttempted - $totalCorrect;
        $remark = $totalCorrect >= $totalQuestions * 0.7 ? 'Pass' : 'Fail';

        // Return the response as JSON
        return response()->json([
            'assessment' => $assessment,
            'responses' => $responses,
            'totalQuestions' => $totalQuestions,
            'totalAttempted' => $totalAttempted,
            'totalCorrect' => $totalCorrect,
            'totalFailed' => $totalFailed,
            'remark' => $remark,
        ]);
    } catch (\Exception $e) {
        // Return an error response if any exception occurs
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



}
