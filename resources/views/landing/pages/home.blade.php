<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koyify - AI-Powered ICT Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .dotted-border {
            border: 3px dotted #6366F1;
            border-radius: 12px;
        }
        
        .countdown-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-purple-50 font-sans text-gray-800">
    <!-- Main Container -->
    <div class="container mx-auto px-4 py-8 md:py-12">
        <!-- Logo and Intro -->
        <div class="text-center mb-8">
            <h1 class="text-4xl md:text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600 mb-4">Koyify.com</h1>
            <p class="text-lg md:text-xl text-indigo-800 font-medium">Unlocking Tech Careers for Northern Nigeria</p>
        </div>
        
        <!-- Launch Countdown -->
        <div class="dotted-border bg-white p-6 mb-10 shadow-lg max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-center text-indigo-700 mb-4">Launching Soon!</h2>
            <div class="flex justify-center gap-4 md:gap-8 mb-4">
                <div class="countdown-item">
                    <span id="days" class="text-3xl md:text-4xl font-bold text-purple-600">30</span>
                    <span class="text-sm text-gray-600">Days</span>
                </div>
                <div class="countdown-item">
                    <span id="hours" class="text-3xl md:text-4xl font-bold text-purple-600">12</span>
                    <span class="text-sm text-gray-600">Hours</span>
                </div>
                <div class="countdown-item">
                    <span id="minutes" class="text-3xl md:text-4xl font-bold text-purple-600">30</span>
                    <span class="text-sm text-gray-600">Minutes</span>
                </div>
                <div class="countdown-item">
                    <span id="seconds" class="text-3xl md:text-4xl font-bold text-purple-600">00</span>
                    <span class="text-sm text-gray-600">Seconds</span>
                </div>
            </div>
            <p class="text-center text-indigo-600 font-medium">Join our WhatsApp community now for early access!</p>
        </div>
        
        <!-- Main Message -->
        <div class="dotted-border bg-white p-6 md:p-8 mb-10 shadow-lg max-w-4xl mx-auto">
            <div class="flex flex-col md:flex-row items-center gap-6 mb-6">
                <div class="md:w-1/2">
                    <h2 class="text-2xl md:text-3xl font-bold text-indigo-700 mb-4">Learn Tech Skills in Your Language</h2>
                    <p class="mb-4">Koyify is Nigeria's first Hausa-friendly AI-powered ICT learning platform, designed to help beginners launch successful tech careers without expensive education.</p>
                    <p>Learn directly from your mobile phone, in a language you understand best, supported by a community of like-minded individuals.</p>
                </div>
                <div class="md:w-1/2">
                    <div class="rounded-lg bg-gradient-to-r from-purple-500 to-indigo-500 p-1">
                        <div class="bg-white rounded-lg p-4">
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span>AI Career Planner & Personalized Roadmap</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span>Courses in English & Hausa (Igbo & Yoruba coming soon)</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span>Community support & expert mentorship</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span>Learn from your mobile phone</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                    <span>Earn in dollars as a freelancer</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#join-form" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fab fa-whatsapp mr-2"></i> Join Our WhatsApp Community
                </a>
            </div>
        </div>
        
        <!-- Success Stories Banner -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-6 rounded-lg mb-10 max-w-4xl mx-auto shadow-lg">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-3">Transform Your Future with Tech Skills</h2>
                <p class="mb-4">Join thousands of Northern Nigerians already on their way to high-paying tech careers. No need for expensive degrees - just dedication and the right guidance.</p>
                <a href="#join-form" class="inline-block bg-white text-indigo-700 hover:bg-indigo-100 font-bold py-2 px-6 rounded-full transition duration-300">
                    <i class="fab fa-whatsapp mr-2"></i> Get Early Access
                </a>
            </div>
        </div>
        
        <!-- Registration Form -->
        <div id="join-form" class="dotted-border bg-white p-6 md:p-8 shadow-lg max-w-4xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-indigo-700 mb-6">Join Our Community Today</h2>
            <p class="text-center mb-6">Complete this quick form to join our WhatsApp community and get early access benefits:</p>
            
            <form class="space-y-4" method="POST" action="{{ route('submit-tech-form') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                        <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Your name" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-1">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Your email address" required>
                    </div>
                </div>
                
                <div>
                    <label for="phone" class="block text-gray-700 font-medium mb-1">Phone Number (WhatsApp)</label>
                    <input type="tel" id="phone" name="phone" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Your WhatsApp number" required>
                </div>
                
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Which tech skills are you interested in learning? (Select all that apply)</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="skills[]" value="web-dev" class="mr-2"> Web Development
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="skills[]" value="mobile-dev" class="mr-2"> Mobile App Development
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="skills[]" value="data-science" class="mr-2"> Data Science & AI
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="skills[]" value="cybersecurity" class="mr-2"> Cybersecurity
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="skills[]" value="ui-ux" class="mr-2"> UI/UX Design
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="skills[]" value="other" class="mr-2"> Other
                        </label>
                    </div>
                </div>
                
                <div>
                    <label class="block text-gray-700 font-medium mb-1">What is your current level of experience in tech?</label>
                    <select name="experience_level" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">Select an option</option>
                        <option value="beginner">Complete Beginner</option>
                        <option value="some-knowledge">Some Basic Knowledge</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>
            
                <div>
                    <label class="block text-gray-700 font-medium mb-1">How do you prefer to learn?</label>
                    <select name="learning_preference" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">Select an option</option>
                        <option value="videos">Video Courses</option>
                        <option value="text">Text-Based Lessons</option>
                        <option value="projects">Project-Based Learning</option>
                        <option value="community">Community/Group Learning</option>
                    </select>
                </div>
            
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Do you prefer courses in Hausa, English, or both?</label>
                    <select name="language_preference" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">Select an option</option>
                        <option value="hausa">Hausa</option>
                        <option value="english">English</option>
                        <option value="both">Both Hausa and English</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-gray-700 font-medium mb-1">What device do you primarily use for learning?</label>
                    <select name="device_preference" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">Select an option</option>
                        <option value="smartphone">Smartphone</option>
                        <option value="laptop">Laptop</option>
                        <option value="both">Both Smartphone and Laptop</option>
                    </select>
                </div>
            
                <div>
                    <label class="block text-gray-700 font-medium mb-1">What is your main goal for learning tech?</label>
                    <select name="learning_goal" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">Select an option</option>
                        <option value="job">Get a job in Nigeria</option>
                        <option value="remote">Get a remote job</option>
                        <option value="freelance">Become a freelancer</option>
                        <option value="business">Start a tech business</option>
                        <option value="skills">Just to improve my skills</option>
                    </select>
                </div>
            
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Do you prefer self-paced or tutor-led courses?</label>
                    <select name="course_format_preference" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">Select an option</option>
                        <option value="self-paced">Self-Paced</option>
                        <option value="tutor-led">Tutor-Led</option>
                        <option value="both">Both</option>
                    </select>
                </div>
            
                <div>
                    <label class="block text-gray-700 font-medium mb-1">What price range do you think is reasonable for a course?</label>
                    <input type="text" name="price_range" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter price range (e.g. ₦5,000 - ₦20,000)">
                </div>
            
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Would you be interested in mentorship and career guidance?</label>
                    <select name="interested_in_mentorship" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">Select an option</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Would you be interested in earning a certification?</label>
                    <select name="interested_in_certification" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">Select an option</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            
                <div class="text-center pt-4">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fab fa-whatsapp mr-2"></i> Join WhatsApp Community
                    </button>
                    <p class="mt-3 text-sm text-gray-600">Get early access, discounts, and free mentorship!</p>
                </div>
            </form>
        </div>
        
        <!-- Copyright -->
        <div class="text-center mt-8 text-gray-600 text-sm">
            <p>&copy; 2025 Koyify.com - Empowering Northern Nigeria with Tech Skills</p>
        </div>
    </div>
    
    <!-- Countdown Script -->
    <script>
        // Set the launch date to April 20, 2025
        const launchDate = new Date("April 20, 2025 00:00:00").getTime();
        
        // Update the countdown every second
        const countdownTimer = setInterval(function() {
            // Get today's date and time
            const now = new Date().getTime();
            
            // Find the time remaining between now and the launch date
            const timeRemaining = launchDate - now;
            
            // Calculate days, hours, minutes and seconds
            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
            
            // Display the results
            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;
            
            // If the countdown is finished, display a message
            if (timeRemaining < 0) {
                clearInterval(countdownTimer);
                document.getElementById("days").innerHTML = "0";
                document.getElementById("hours").innerHTML = "0";
                document.getElementById("minutes").innerHTML = "0";
                document.getElementById("seconds").innerHTML = "0";
            }
        }, 1000);
    </script>
</body>
</html>