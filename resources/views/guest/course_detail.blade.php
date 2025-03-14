@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
<style>
    .course-header {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://via.placeholder.com/1920x1080');
        background-size: cover;
        background-position: center;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Course Header -->
    <div class="course-header text-white rounded-lg shadow-lg p-8 mb-8">
        <h1 class="text-4xl font-bold mb-4">Advanced Web Development with React and Node.js</h1>
        <div class="flex flex-wrap items-center text-sm mb-4">
            <span class="mr-4"><i class="fas fa-clock mr-2"></i>40 hours</span>
            <span class="mr-4"><i class="fas fa-user-graduate mr-2"></i>10,000+ students</span>
            <span class="mr-4"><i class="fas fa-star text-yellow-400 mr-2"></i>4.8 (2,500 reviews)</span>
            <span><i class="fas fa-globe mr-2"></i>English</span>
        </div>
        <p class="text-lg mb-6">Master the latest web technologies and build powerful, scalable applications with this comprehensive course.</p>
        <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-300" id="playFeaturedVideo">
            <i class="fas fa-play mr-2"></i>Watch Course Preview
        </button>
    </div>

    <!-- Course Content -->
    <div class="flex flex-wrap -mx-4">
        <!-- Left Column -->
        <div class="w-full lg:w-2/3 px-4 mb-8">
            <!-- What You'll Learn -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">What You'll Learn</h2>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Build modern, responsive web applications</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Master React.js and its ecosystem</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Develop server-side applications with Node.js</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Implement RESTful APIs and GraphQL</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Work with databases and ORMs</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Deploy applications to cloud platforms</li>
                </ul>
            </div>

            <!-- Course Curriculum -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Course Curriculum</h2>
                <div class="space-y-4" id="curriculum">
                    <!-- Chapter 1 -->
                    <div class="border rounded-lg">
                        <button class="w-full text-left px-4 py-2 font-semibold bg-gray-100 hover:bg-gray-200 focus:outline-none transition duration-300" data-toggle="collapse" data-target="#chapter1">
                            Chapter 1: Introduction to Web Development
                            <i class="fas fa-chevron-down float-right mt-1"></i>
                        </button>
                        <div id="chapter1" class="p-4">
                            <ul class="space-y-2">
                                <li><i class="fas fa-video text-blue-500 mr-2"></i>1.1 Course Overview (15 min)</li>
                                <li><i class="fas fa-video text-blue-500 mr-2"></i>1.2 Setting Up Your Development Environment (30 min)</li>
                                <li><i class="fas fa-file-alt text-green-500 mr-2"></i>1.3 Web Development Basics (Reading)</li>
                                <li><i class="fas fa-question-circle text-purple-500 mr-2"></i>1.4 Chapter Quiz</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Chapter 2 -->
                    <div class="border rounded-lg">
                        <button class="w-full text-left px-4 py-2 font-semibold bg-gray-100 hover:bg-gray-200 focus:outline-none transition duration-300" data-toggle="collapse" data-target="#chapter2">
                            Chapter 2: React.js Fundamentals
                            <i class="fas fa-chevron-down float-right mt-1"></i>
                        </button>
                        <div id="chapter2" class="p-4 hidden">
                            <ul class="space-y-2">
                                <li><i class="fas fa-video text-blue-500 mr-2"></i>2.1 Introduction to React (20 min)</li>
                                <li><i class="fas fa-video text-blue-500 mr-2"></i>2.2 Components and Props (45 min)</li>
                                <li><i class="fas fa-video text-blue-500 mr-2"></i>2.3 State and Lifecycle (40 min)</li>
                                <li><i class="fas fa-file-alt text-green-500 mr-2"></i>2.4 Hands-on Exercise: Building a Todo App</li>
                                <li><i class="fas fa-question-circle text-purple-500 mr-2"></i>2.5 Chapter Quiz</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Add more chapters here -->
                </div>
            </div>

            <!-- Instructor -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Your Instructor</h2>
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/100" alt="Instructor" class="w-20 h-20 rounded-full mr-4">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Dr. Adebayo Ogunlesi</h3>
                        <p class="text-gray-600">Senior Software Engineer & Educator</p>
                        <p class="text-sm text-gray-500 mt-2">Dr. Ogunlesi has over 15 years of experience in web development and has taught thousands of students worldwide. He's passionate about empowering Nigerian youth through technology education.</p>
                    </div>
                </div>
            </div>

            <!-- Reviews -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Student Reviews</h2>
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <div class="flex items-center mb-2">
                            <img src="https://via.placeholder.com/50" alt="Student" class="w-10 h-10 rounded-full mr-2">
                            <div>
                                <h4 class="font-semibold text-gray-800">Chinwe Okoro</h4>
                                <div class="text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700">This course is fantastic! Dr. Ogunlesi explains complex concepts in a way that's easy to understand. I feel much more confident in my web development skills now.</p>
                    </div>
                    <div class="border-b pb-4">
                        <div class="flex items-center mb-2">
                            <img src="https://via.placeholder.com/50" alt="Student" class="w-10 h-10 rounded-full mr-2">
                            <div>
                                <h4 class="font-semibold text-gray-800">Oluwaseun Adeleke</h4>
                                <div class="text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700">Great course content and structure. The hands-on projects really helped solidify my understanding. Looking forward to applying these skills in my career.</p>
                    </div>
                    <!-- Add more reviews here -->
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="w-full lg:w-1/3 px-4">
            <div class="bg-white rounded-lg shadow-lg p-6 sticky top-8">
                <img src="https://via.placeholder.com/400x225" alt="Course thumbnail" class="w-full rounded-lg mb-4">
                <div class="text-3xl font-bold text-gray-800 mb-4">₦50,000</div>
                <button class="w-full bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 mb-4">
                    <i class="fas fa-shopping-cart mr-2"></i>Enroll Now
                </button>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li><i class="fas fa-infinity mr-2"></i>Full lifetime access</li>
                    <li><i class="fas fa-mobile-alt mr-2"></i>Access on mobile and TV</li>
                    <li><i class="fas fa-certificate mr-2"></i>Certificate of completion</li>
                    <li><i class="fas fa-user-friends mr-2"></i>Join 1000+ learners</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div id="videoModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-4 w-full max-w-3xl">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">Course Preview</h3>
            <button id="closeVideoModal" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div id="featuredVideoPlayer"></div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
<script>
    // Curriculum collapse functionality
    document.querySelectorAll('[data-toggle="collapse"]').forEach(button => {
        button.addEventListener('click', () => {
            const target = document.querySelector(button.getAttribute('data-target'));
            target.classList.toggle('hidden');
            button.querySelector('i').classList.toggle('fa-chevron-down');
            button.querySelector('i').classList.toggle('fa-chevron-up');
        });
    });

    // Video modal functionality
    const videoModal = document.getElementById('videoModal');
    const playFeaturedVideo = document.getElementById('playFeaturedVideo');
    const closeVideoModal = document.getElementById('closeVideoModal');
    const featuredVideoPlayer = document.getElementById('featuredVideoPlayer');

    playFeaturedVideo.addEventListener('click', () => {
        videoModal.classList.remove('hidden');
        
        // Create video element
        const videoElement = document.createElement('video');
        videoElement.setAttribute('controls', '');
        videoElement.setAttribute('playsinline', '');
        
        // Set the source to your video file
        const sourceElement = document.createElement('source');
        sourceElement.src = "{{ asset('/uploads/65cb6089aea91.mp4') }}";
        sourceElement.type = 'video/mp4';
        
        videoElement.appendChild(sourceElement);
        featuredVideoPlayer.appendChild(videoElement);

        // Initialize Plyr
        const player = new Plyr(videoElement);
    });

    closeVideoModal.addEventListener('click', () => {
        videoModal.classList.add('hidden');
        featuredVideoPlayer.innerHTML = '';
    });
</script>
@endsection