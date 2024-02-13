<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorsController extends Controller
{
    public function profileIndex()
    {
        $user = Auth::user();
        $profile = $user->profile ?? (object) [
            'biography' => '',
            'facebookLink' => '',
            'twitterLink' => '',
            'linkedInLink' => '',
            // Add other profile attributes with default values here
        ];

        return view('instructors.profile', compact('user', 'profile'));
    }

    public function profileStore(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'profession' => 'nullable|string|max:255',
            'biography' => 'nullable|string',
            'facebookLink' => 'nullable|url|max:255',
            'twitterLink' => 'nullable|url|max:255',
            'linkedInLink' => 'nullable|url|max:255',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust allowed file types and size as needed
        ];

        // Validate the request data
        $request->validate($rules);

        // Update user information
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        // Update profile information
        $profile = $user->profile ?? $user->profile()->create();
        $profile->biography = $request->input('biography');
        $profile->facebookLink = $request->input('facebookLink');
        $profile->twitterLink = $request->input('twitterLink');
        $profile->linkedInLink = $request->input('linkedInLink');
        $profile->profession = $request->input('profession');

        // Handle profile picture upload
        if ($request->hasFile('profilePicture')) {
            $image = $request->file('profilePicture');
            $imageName = 'profile_picture_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

            // Update the user's profile image
            $user->profile_image = 'uploads/' . $imageName;
        }

        // Save changes
        $user->save();
        $profile->save();

        return redirect()->route('instructor.profile.index')->with('success', 'Profile updated successfully.');
    }

}
