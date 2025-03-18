<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AuthenticationController extends Controller
{
    public function registerIndex()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'unique:users,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'password' => [
                'required', 
                'confirmed', 
                Password::min(6)
                    // ->mixedCase()
                    // ->numbers()
                    // ->symbols()
            ],
            'terms' => ['required', 'accepted'],
            'referral_code' => ['nullable', 'string', 'exists:users,referral_code']
        ], [
            'terms.accepted' => 'You must agree to the Terms of Service and Privacy Policy'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        // Get referrer if referral code is provided
        $referredBy = null;
        if ($request->filled('referral_code')) {
            $referrer = User::where('referral_code', $request->referral_code)->first();
            if ($referrer) {
                $referredBy = $referrer->id;
            }
        }
        
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'referral_code' => Str::random(8),
            'referred_by' => $referredBy,
        ]);
        
       
        
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Your account has been created successfully!',
            'redirect' => '/login'
        ]);
    }

    public function loginIndex(Request $request)
    {
        $returnUrl = $request->query('return_to', '/');

        return view('auth.login', compact('returnUrl'));
    }

    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Determine if login is email or phone
        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $credentials = [
            $loginField => $request->login,
            'password' => $request->password
        ];

        // Attempt login
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            
            // Get user role and determine redirect path
            $user = Auth::user();
            $redirectPath = $this->getRedirectPath($user);
            
            return response()->json([
                'message' => 'Login successful!',
                'redirect' => $redirectPath
            ]);
        }

        // Authentication failed
        return response()->json([
            'message' => 'These credentials do not match our records.'
        ], 401);
    }

    protected function getRedirectPath($user)
    {
        switch ($user->role) {
            case 'admin':
                return route('admin.dashboard');
            case 'instructor':
                return route('instructor.dashboard');
            case 'student':
            default:
                return route('student.dashboard');
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

   
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = $this->findOrCreateUser($googleUser, 'google');
            
            Auth::login($user);
            
            return redirect($this->getRedirectPath($user));
            
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Failed to login with Google. Please try again.');
        }
    }

  
    protected function findOrCreateUser($socialUser, $provider)
    {
        // Find user by social ID or email
        $user = User::where('provider_id', $socialUser->getId())
                    ->orWhere('email', $socialUser->getEmail())
                    ->first();

        if (!$user) {
            // Create new user
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'role' => 'student', // Default role
                'email_verified_at' => now(), // Social login is considered verified
                'password' => bcrypt(str_random(16)), // Random password
            ]);
        }

        return $user;
    }

  
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
