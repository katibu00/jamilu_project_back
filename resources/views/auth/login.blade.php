@extends('landing.layouts.app')

@section('content')
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full" data-aos="fade-up" data-aos-duration="1000">
        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden custom-shadow card-hover">
            <!-- Card Header -->
            <div class="hero-gradient px-6 py-8 text-center">
                <h2 class="text-2xl font-bold text-white">Welcome Back</h2>
                <p class="mt-2 text-gray-200">Log in to your Koyify account</p>
            </div>
            
            <!-- Login Form -->
            <div class="px-6 py-8">
                {{-- @include('landing.layouts.alerts') --}}
                
                <form id="loginForm" class="mt-4 space-y-6">
                    <div class="field-group">
                        <label for="login" class="block text-sm font-medium text-gray-700 mb-2">Email or Phone Number</label>
                        <div class="relative">
                            <i class="fas fa-user input-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" id="login" name="login" class="pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-transparent transition duration-200" placeholder="Enter your email or phone number">
                        </div>
                        <p class="text-xs text-red-500 mt-1 hidden" id="loginError"></p>
                    </div>
                    
                    <div class="field-group">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <i class="fas fa-lock input-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="password" id="password" name="password" class="pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-transparent transition duration-200" placeholder="Enter your password">
                            <i class="fas fa-eye password-toggle absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer" id="passwordToggle"></i>
                        </div>
                        <p class="text-xs text-red-500 mt-1 hidden" id="passwordError"></p>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <label class="flex items-center text-sm text-gray-700">
                            <input type="checkbox" name="remember" id="remember" class="rounded text-blue-600 focus:ring-blue-500 h-4 w-4">
                            <span class="ml-2">Remember me</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">Forgot password?</a>
                    </div>
                    
                    <button type="submit" id="submitBtn" class="btn-primary w-full py-3 rounded-lg text-white font-medium flex items-center justify-center shadow-lg">
                        <span>Sign In</span>
                        <span id="loadingSpinner" class="ml-2 hidden">
                            <i class="fas fa-spinner fa-spin"></i>
                        </span>
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:text-blue-800 transition duration-200">Create Account</a></p>
                </div>
                
                <div class="mt-8 pt-6 border-t border-gray-200 flex flex-col items-center">
                    <p class="text-sm text-gray-500 mb-4">Or sign in with</p>
                    <div class="flex space-x-4">
                        <a href="{{ route('auth.google') }}" class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 hover:bg-gray-200 transition-all">
                            <i class="fab fa-google text-gray-700"></i>
                        </a>
                        <a href="{{ route('auth.facebook') }}" class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 hover:bg-gray-200 transition-all">
                            <i class="fab fa-facebook-f text-gray-700"></i>
                        </a>
                        <a href="{{ route('auth.linkedin') }}" class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 hover:bg-gray-200 transition-all">
                            <i class="fab fa-linkedin-in text-gray-700"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-6">
            <p class="text-xs text-gray-500">Protected by reCAPTCHA and subject to our Privacy Policy and Terms of Service</p>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
$(document).ready(function() {
    // Password visibility toggle functionality
    $('#passwordToggle').on('click', function() {
        const passwordInput = $('#password');
        const icon = $(this);
        
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordInput.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
    
    // Login form submission
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        // Reset error messages
        $('.text-red-500').addClass('hidden');
        
        // Show loading spinner
        $('#submitBtn span:first-child').text('Signing In...');
        $('#loadingSpinner').removeClass('hidden');
        $('#submitBtn').prop('disabled', true);
        
        // Get form data
        const formData = {
            login: $('#login').val(),
            password: $('#password').val(),
            remember: $('#remember').is(':checked') ? 1 : 0
        };
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '/login',
            data: formData,
            success: function(response) {
                // Redirect based on user role
                window.location.href = response.redirect || '/dashboard';
            },
            error: function(xhr) {
                // Reset button state
                $('#submitBtn span:first-child').text('Sign In');
                $('#loadingSpinner').addClass('hidden');
                $('#submitBtn').prop('disabled', false);
                
                if (xhr.status === 422) {
                    // Validation errors
                    const errors = xhr.responseJSON.errors;
                    
                    // Display error messages for each field
                    if (errors.login) {
                        $('#loginError').text(errors.login[0]).removeClass('hidden');
                    }
                    
                    if (errors.password) {
                        $('#passwordError').text(errors.password[0]).removeClass('hidden');
                    }
                } else {
                    // Authentication failed or server error
                    $('#loginError').text(xhr.responseJSON.message || 'Invalid credentials. Please try again.').removeClass('hidden');
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: xhr.responseJSON.message || 'Invalid credentials. Please try again.',
                        confirmButtonColor: '#3B82F6'
                    });
                }
            }
        });
    });
    
    // Registration link functionality
    $('a:contains("Create Account")').on('click', function(e) {
        e.preventDefault();
        window.location.href = $(this).attr('href') || '/register';
    });
});
</script>
@endpush
@endsection