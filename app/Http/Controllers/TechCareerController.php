<?php

namespace App\Http\Controllers;

use App\Models\TechApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TechCareerController extends Controller
{
    /**
     * Show the tech career application form.
     */
    public function showForm()
    {
        return view('landing.pages.home');
    }

    /**
     * Handle form submission.
     */
    public function submitForm(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'skills' => 'nullable|array',
            'experience_level' => 'nullable|string',
            'learning_preference' => 'nullable|string',
            'language_preference' => 'nullable|string',
            'device_preference' => 'nullable|string',
            'learning_goal' => 'nullable|string',
            'course_format_preference' => 'nullable|string',
            'price_range' => 'nullable|string',
            'interested_in_mentorship' => 'nullable|string',
            'interested_in_certification' => 'nullable|string',
        ]);

        // Convert yes/no string values to boolean
        $mentorship = $validated['interested_in_mentorship'] == 'yes' ? true : false;
        $certification = $validated['interested_in_certification'] == 'yes' ? true : false;
        
        // Create new application record
        $application = TechApplication::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'skills_interested' => $validated['skills'] ?? [],
            'experience_level' => $validated['experience_level'] ?? null,
            'learning_preference' => $validated['learning_preference'] ?? null,
            'language_preference' => $validated['language_preference'] ?? null,
            'device_preference' => $validated['device_preference'] ?? null,
            'learning_goal' => $validated['learning_goal'] ?? null,
            'course_format_preference' => $validated['course_format_preference'] ?? null,
            'price_range' => $validated['price_range'] ?? null,
            'interested_in_mentorship' => $mentorship,
            'interested_in_certification' => $certification,
            'joined_whatsapp' => true
        ]);

        // Send email notification using FormSubmit.co
        try {
            $this->sendEmailNotification($application);
        } catch (\Exception $e) {
            Log::error('Failed to send email notification: ' . $e->getMessage());
        }

        // Redirect to thank you page
        return redirect()->route('thank-you');
    }

    /**
     * Display thank you page.
     */
    public function thankYou()
    {
        return view('tech.thank-you');
    }

    /**
     * Send email notification using FormSubmit.co.
     */
    private function sendEmailNotification($application)
    {
        $skills = is_array($application->skills_interested) 
            ? implode(', ', $application->skills_interested) 
            : $application->skills_interested;
            
        $mentorship = $application->interested_in_mentorship ? 'Yes' : 'No';
        $certification = $application->interested_in_certification ? 'Yes' : 'No';

        $formData = [
            'name' => $application->name,
            'email' => $application->email,
            'phone' => $application->phone,
            'skills' => $skills,
            'experience_level' => $application->experience_level,
            'learning_preference' => $application->learning_preference,
            'language_preference' => $application->language_preference,
            'device_preference' => $application->device_preference,
            'learning_goal' => $application->learning_goal,
            'course_format_preference' => $application->course_format_preference,
            'price_range' => $application->price_range,
            'interested_in_mentorship' => $mentorship,
            'interested_in_certification' => $certification,
            '_subject' => 'New Koyify Tech Application',
            '_captcha' => 'false'
        ];

        // FormSubmit.co endpoint
        Http::asForm()->post('https://formsubmit.co/ukmisau@gmail.com', $formData);
    }
}