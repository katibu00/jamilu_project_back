<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminAssessmentController extends Controller
{
    public function manageIndex()
    {
        $data['markPercentages'] = [5, 10, 15, 20, 25, 30, 35, 40, 50, 60, 70, 100];

        $data['durations'] = [
            900 => '15 mins',
            1800 => '30 mins',
            2700 => '45 mins',
            3600 => '1 hour',
            5400 => '1 hour 30 mins',
            1 => 'Unlimited',
        ];
        $data['assessments'] = Assessment::where('instructor_id', auth()->user()->id)->get();

        return view('instructors.assessments.index', $data);
    }

    public function storeExam(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|integer',
            'numQuestions' => 'required|in:all,10,15,20,25,30,35,40,50,60,70,100',
            'attemptLimit' => 'required|in:unlimited,1,2,3',
            'showResult' => 'required|in:yes,no',
        ]);

        $assessment = new Assessment();
        $assessment->instructor_id = auth()->user()->id;
        $assessment->title = $request->input('title');
        $assessment->duration = $request->input('duration');
        $assessment->num_questions = $request->input('numQuestions');
        $assessment->attempt_limit = $request->input('attemptLimit');
        $assessment->show_result = $request->input('showResult');

        $assessment->save();

        return redirect()->back()->with('success', 'Assessment created successfully!');
    }

    public function showQuestionsPage(Request $request)
    {
        $examId = $request->query('examId');
        $questions = Question::where('assessment_id', $examId)->latest()->get();

        return view('instructors.assessments.questions', [
            'examId' => $examId,
            'questions' => $questions,
        ]);
    }

    public function storeQuestions(Request $request)
    {
        Validator::make($request->all(), [
            'questionContent' => 'required',
            'option.*' => 'required|string',
            'correct_option' => 'required|integer|min:1',
        ])->after(function ($validator) {
            foreach ($validator->getData()['option'] as $option) {
                if ($option === null) {
                    $validator->errors()->add('option', 'All options must be filled.');
                    break;
                }
            }
        })->validate();

        $questionContent = $request->input('questionContent');
        $options = $request->input('option');
        $correctOptionIndex = (int) $request->input('correct_option') - 1;
        $correctAnswer = $options[$correctOptionIndex];

        DB::table('questions')->insert([
            'assessment_id' => $request->examId,
            'question' => $questionContent,
            'options' => json_encode($options),
            'correct_answer' => $correctAnswer,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Question saved successfully']);
    }

    public function destroyQuestions(Request $request, $question)
    {
        try {
            $question = Question::findOrFail($question);

            $question->delete();

            return response()->json(['message' => 'Question deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete question: ' . $e->getMessage()], 500);
        }
    }

    public function editQuestions(Question $question)
    {
        return view('instructors.assessments.edit_question', compact('question'));
    }

    public function updateQuestion(Request $request, $questionId)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'questionContent' => 'required',
            'option.*' => 'required|string',
            'correct_option' => 'required|string',
        ])->after(function ($validator) {
            foreach ($validator->getData()['option'] as $option) {
                if ($option === null) {
                    $validator->errors()->add('option', 'All options must be filled.');
                    break;
                }
            }
        })->validate();

        $question = Question::find($questionId);

        if (!$question) {
            return response()->json(['error' => 'Question not found.'], 404);
        }

        $questionContent = $request->input('questionContent');
        $options = $request->input('option');
        $correctOption = $request->input('correct_option');

        $question->question = $questionContent;
        $question->options = $options;
        $question->correct_answer = $correctOption;
        $question->updated_at = now();

        $question->save();

        return response()->json(['message' => 'Question updated successfully.']);
    }


    public function saveSchedule(Request $request)
    {
        $request->validate([
            'examId' => 'required|integer',
            'startDate' => 'required|date',
            'startTime' => 'required',
            'endDate' => 'required|date',
            'endTime' => 'required',
        ]);

        $examId = $request->input('examId');
        $startDate = $request->input('startDate');
        $startTime = $request->input('startTime');
        $endDate = $request->input('endDate');
        $endTime = $request->input('endTime');

        $startDateTime = Carbon::createFromFormat('Y-m-d H:i', "$startDate $startTime")->format('Y-m-d H:i:s');
        $endDateTime = Carbon::createFromFormat('Y-m-d H:i', "$endDate $endTime")->format('Y-m-d H:i:s');

        $numQuestionsInQuestionsTable = Question::where('exam_id', $examId)->count();

        // Get the number of questions required for the exam
        $exam = Assessment::findOrFail($examId);
        $requiredNumQuestions = $exam->num_questions === 'all' ? $numQuestionsInQuestionsTable : (int) $exam->num_questions;

        // if ($numQuestionsInQuestionsTable < $requiredNumQuestions) {
        //     return response()->json([
        //         'message' => 'The number of questions is less than the required number for the exam. Add questions First.',
        //     ], 422);
        // }

        // Update the exam with the scheduled start and end date/time
        DB::table('assessments')->where('id', $examId)->update([
            'start_datetime' => $startDateTime,
            'end_datetime' => $endDateTime,
            'status' => 'scheduled',
        ]);

        return response()->json(['message' => 'Schedule saved successfully']);
    }

    public function getSchedule(Request $request)
    {
        $examId = $request->input('examId');

        $assessment = Assessment::find($examId);

        if (!$assessment) {
            return response()->json(['error' => 'Exam not found.'], 404);
        }

        $startDatetime = $assessment->start_datetime ? Carbon::parse($assessment->start_datetime) : null;
        $endDatetime = $assessment->end_datetime ? Carbon::parse($assessment->end_datetime) : null;

        $startDate = $startDatetime ? $startDatetime->format('Y-m-d') : null;
        $startTime = $startDatetime ? $startDatetime->format('H:i') : null;
        $endDate = $endDatetime ? $endDatetime->format('Y-m-d') : null;
        $endTime = $endDatetime ? $endDatetime->format('H:i') : null;

        return response()->json([
            'start_date' => $startDate,
            'start_time' => $startTime,
            'end_date' => $endDate,
            'end_time' => $endTime,
        ]);
    }

    public function getExamDetails(Request $request)
    {
        $examId = $request->input('examId');
        $assessment = Assessment::findOrFail($examId);

        $startDateTime = $assessment->start_datetime ? Carbon::parse($assessment->start_datetime) : null;
        $endDateTime = $assessment->end_datetime ? Carbon::parse($assessment->end_datetime) : null;



        $examDetails = [
            'title' => $assessment->title,
            'category' => $assessment->category,
            'duration' => $assessment->duration,
            'status' => $assessment->status,
            'numQuestions' => $assessment->num_questions,
            'attemptLimit' => $assessment->attempt_limit,
            'showResult' => $assessment->show_result,
            'startDate' => $startDateTime ? $startDateTime->format('Y-m-d') : null,
            'startTime' => $startDateTime ? $startDateTime->format('H:i') : null,
            'endDate' => $endDateTime ? $endDateTime->format('Y-m-d') : null,
            'endTime' => $endDateTime ? $endDateTime->format('H:i') : null,
        ];

        return response()->json($examDetails);
    }

    public function deleteExam(Request $request)
    {
        $examId = $request->input('examId');
        $assessment = Assessment::findOrFail($examId);

        // Delete the exam
        $assessment->delete();

        return response()->json(['message' => 'Exam deleted successfully']);
    }

    public function editExam($examId)
    {
        $exam = Assessment::findOrFail($examId);
        
        $durations = [
            900 => '15 mins',
            1800 => '30 mins',
            2700 => '45 mins',
            3600 => '1 hour',
            5400 => '1 hour 30 mins',
            1 => 'Unlimited',
        ];

        return view('instructors.assessments.edit_assessment', compact('exam', 'durations'));
    }

    public function updateExam(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|integer',
            'numQuestions' => 'required|string|in:all,10,15,20,25,30,35,40,50,60,70,100',
            'attemptLimit' => 'required|string|in:unlimited,1,2,3',
            'showResult' => 'required|string|in:yes,no',

        ]);

        $assessment = Assessment::findOrFail($id);
        $assessment->title = $request->input('title');
        $assessment->duration = $request->input('duration');
        $assessment->num_questions = $request->input('numQuestions');
        $assessment->attempt_limit = $request->input('attemptLimit');
        $assessment->show_result = $request->input('showResult');

        $assessment->save();

        return redirect()->route('instructor.assessments.index')->with('success', 'Assessment updated successfully!');
    }
}
