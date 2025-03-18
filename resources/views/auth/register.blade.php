@extends('landing.layouts.app')

@section('content')
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full" data-aos="fade-up" data-aos-duration="1000">
        <!-- Registration Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden custom-shadow card-hover">
            <!-- Card Header -->
            <div class="hero-gradient px-6 py-8 text-center">
                <h2 class="text-2xl font-bold text-white">Create Your Account</h2>
                <p class="mt-2 text-gray-200">Join Koyify and launch your tech career journey</p>
            </div>
            
            <!-- Registration Form -->
            <div class="px-6 py-8">
                {{-- @include('landing.layouts.alerts') --}}
                
                <form id="registerForm" class="mt-4 space-y-6">
                    <div class="field-group">
                        <label for="fullname" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <div class="relative">
                            <i class="fas fa-user input-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" id="fullname" name="fullname" class="pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-transparent transition duration-200" placeholder="Enter your full name">
                        </div>
                        <p class="text-xs text-red-500 mt-1 hidden" id="fullnameError"></p>
                    </div>

                    <div class="field-group">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <i class="fas fa-envelope input-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="email" id="email" name="email" class="pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-transparent transition duration-200" placeholder="Enter your email address">
                        </div>
                        <p class="text-xs text-red-500 mt-1 hidden" id="emailError"></p>
                    </div>
                    
                    <div class="field-group">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <div class="relative">
                            <i class="fas fa-phone input-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="tel" id="phone" name="phone" class="pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-transparent transition duration-200" placeholder="Enter your phone number">
                        </div>
                        <p class="text-xs text-red-500 mt-1 hidden" id="phoneError"></p>
                    </div>
                    
                    <div class="field-group">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <i class="fas fa-lock input-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="password" id="password" name="password" class="pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-transparent transition duration-200" placeholder="Create a strong password">
                            <i class="fas fa-eye password-toggle absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer" id="passwordToggle"></i>
                        </div>
                        <p class="text-xs text-red-500 mt-1 hidden" id="passwordError"></p>
                    </div>
                    
                    <div class="field-group">
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <div class="relative">
                            <i class="fas fa-lock input-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="password" id="confirm-password" name="password_confirmation" class="pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-transparent transition duration-200" placeholder="Confirm your password">
                            <i class="fas fa-eye password-toggle absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer" id="confirmPasswordToggle"></i>
                        </div>
                        <p class="text-xs text-red-500 mt-1 hidden" id="confirmPasswordError"></p>
                    </div>
                    
                    <!-- Referral Code (Optional) -->
                    <div class="field-group">
                        <label for="referral-code" class="block text-sm font-medium text-gray-700 mb-2">Referral Code (Optional)</label>
                        <div class="relative">
                            <i class="fas fa-gift input-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" id="referral-code" name="referral_code" class="pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-transparent transition duration-200" placeholder="Enter referral code if you have one">
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label class="flex items-center text-sm text-gray-700">
                            <input type="checkbox" name="terms" id="terms" class="rounded text-blue-600 focus:ring-blue-500 h-4 w-4">
                            <span class="ml-2">I agree to the <a href="#" class="text-blue-600 hover:text-blue-800">Terms of Service</a> and <a href="#" class="text-blue-600 hover:text-blue-800">Privacy Policy</a></span>
                        </label>
                        <p class="text-xs text-red-500 mt-1 hidden" id="termsError"></p>
                    </div>
                    
                    <button type="submit" id="submitBtn" class="btn-primary w-full py-3 rounded-lg text-white font-medium flex items-center justify-center shadow-lg">
                        <span>Create Account</span>
                        <span id="loadingSpinner" class="ml-2 hidden">
                            <i class="fas fa-spinner fa-spin"></i>
                        </span>
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:text-blue-800 transition duration-200">Sign In</a></p>
                </div>
                
                <div class="mt-8 pt-6 border-t border-gray-200 flex flex-col items-center">
                    <p class="text-sm text-gray-500 mb-4">Or sign up with</p>
                    <div class="flex space-x-4">
                        <a href="#" class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 hover:bg-gray-200 transition-all">
                            <i class="fab fa-google text-gray-700"></i>
                        </a>
                        <a href="#" class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 hover:bg-gray-200 transition-all">
                            <i class="fab fa-facebook-f text-gray-700"></i>
                        </a>
                        <a href="#" class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 hover:bg-gray-200 transition-all">
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
    
    // Confirm password visibility toggle
    $('#confirmPasswordToggle').on('click', function() {
        const confirmPasswordInput = $('#confirm-password');
        const icon = $(this);
        
        if (confirmPasswordInput.attr('type') === 'password') {
            confirmPasswordInput.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            confirmPasswordInput.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
    
    // Register form submission
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        
        // Reset error messages
        $('.text-red-500').addClass('hidden');
        
        // Show loading spinner
        $('#submitBtn span:first-child').text('Processing...');
        $('#loadingSpinner').removeClass('hidden');
        $('#submitBtn').prop('disabled', true);
        
        // Get form data
        const formData = {
            name: $('#fullname').val(),
            username: $('#username').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            password: $('#password').val(),
            password_confirmation: $('#confirm-password').val(),
            referral_code: $('#referral-code').val(),
            terms: $('#terms').is(':checked') ? 1 : 0
        };
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '/register',
            data: formData,
            success: function(response) {
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Registration Successful!',
                    text: response.message || 'Your account has been created successfully.',
                    confirmButtonColor: '#3B82F6'
                }).then((result) => {
                    // Redirect to login or dashboard
                    window.location.href = response.redirect || '/login';
                });
            },
            error: function(xhr) {
                // Reset button state
                $('#submitBtn span:first-child').text('Create Account');
                $('#loadingSpinner').addClass('hidden');
                $('#submitBtn').prop('disabled', false);
                
                if (xhr.status === 422) {
                    // Validation errors
                    const errors = xhr.responseJSON.errors;
                    
                    // Display error messages for each field
                    if (errors.name) {
                        $('#fullnameError').text(errors.name[0]).removeClass('hidden');
                    }
                    
                    if (errors.username) {
                        $('#usernameError').text(errors.username[0]).removeClass('hidden');
                    }
                    
                    if (errors.email) {
                        $('#emailError').text(errors.email[0]).removeClass('hidden');
                    }
                    
                    if (errors.phone) {
                        $('#phoneError').text(errors.phone[0]).removeClass('hidden');
                    }
                    
                    if (errors.password) {
                        $('#passwordError').text(errors.password[0]).removeClass('hidden');
                    }
                    
                    if (errors.terms) {
                        $('#termsError').text('You must agree to the Terms of Service and Privacy Policy').removeClass('hidden');
                    }
                    
                    // Show alert for general errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please check the form for errors.',
                        confirmButtonColor: '#3B82F6'
                    });
                } else {
                    // Server or other errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Registration Failed',
                        text: xhr.responseJSON.message || 'Something went wrong. Please try again later.',
                        confirmButtonColor: '#3B82F6'
                    });
                }
            }
        });
    });
    
    // Login functionality for the "Sign In" link
    $('a:contains("Sign In")').on('click', function(e) {
        e.preventDefault();
        window.location.href = $(this).attr('href') || '/login';
    });
});
</script>
@endpush
@endsection