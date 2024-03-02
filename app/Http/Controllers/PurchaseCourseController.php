<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\PaystackAPIKey;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PurchaseCourseController extends Controller
{

    public function purchaseViaPaystack(Request $request)
    {
        // Validate the request data
        $request->validate([
            'reference' => 'required|string',
            '_token' => 'required|string',
        ]);
    
        // Retrieve the payment reference from the request
        $reference = $request->input('reference');
    
        // Verify the payment with Paystack API
        $paystackUrl = 'https://api.paystack.co/transaction/verify/' . $reference;
        $paystackSecretKey = PaystackAPIKey::first()->secret_key ?? '';
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paystackUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $paystackSecretKey
        ]);
    
        $response = curl_exec($ch);
        curl_close($ch);
    
        // Check if the payment verification was successful
        if ($response) {
            $responseData = json_decode($response, true);
    
            if ($responseData['status'] === true && $responseData['data']['status'] === 'success') {
                // Payment was successful, handle course purchase
                $metadata = $responseData['data']['metadata'];
                $user_id = $metadata['user_id'] ?? null;
                $course_id = $metadata['course_id'] ?? null;
    
                // Check if user_id and course_id are valid
                if (!$user_id || !$course_id) {
                    return response()->json(['success' => false, 'message' => 'Invalid user_id or course_id.']);
                }
    
                // Retrieve the user and course
                $user = User::find($user_id);
                $course = Course::findOrFail($course_id);
    
                // Check if the user has already purchased the course
                if ($user->courses->contains($course)) {
                    return response()->json(['success' => false, 'message' => 'You have already purchased this course.']);
                }
    
                // Proceed with the purchase
                // Find the first chapter and lesson of the course
                $firstChapter = $course->chapters->first();
                $firstLesson = $firstChapter ? $firstChapter->contents->first() : null;
    
                // Define course progress
                $progress = [
                    'current_chapter' => $firstChapter ? $firstChapter->id : null,
                    'completed_chapters' => [],
                    'current_lesson' => $firstLesson ? $firstLesson->id : null,
                    'completed_lessons' => []
                ];
    
                // Attach the course to the user
                $user->courses()->attach($course, ['progress' => json_encode($progress)]);
    
                // Return success response
                return response()->json(['success' => true, 'message' => 'Course purchased successfully.']);
            }
        }
    
        // Payment verification failed or payment was not successful
        return response()->json(['success' => false, 'message' => 'Payment verification failed or payment was not successful.']);
    }
   
}
