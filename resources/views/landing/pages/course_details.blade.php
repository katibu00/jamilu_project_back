<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Python Programming - TechNaija</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styles for improved mobile experience */
        body {
            padding-bottom: 80px;
            /* Add space for the fixed bottom CTA */
        }

        .course-content {
            max-height: 100%;
            overflow-y: auto;
        }

        /* Fix for mobile scrolling */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Improved touch targets for mobile */
        .mobile-tap-target {
            min-height: 44px;
            min-width: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Collapsible sections */
        .chapter-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .chapter-content.open {
            max-height: 500px;
        }

        /* Improved readability on mobile */
        @media (max-width: 640px) {
            .text-sm {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 pb-24">
    <!-- Navigation -->
    <nav class="bg-indigo-600 text-white p-4 flex justify-between items-center sticky top-0 z-30 shadow-md">
        <div class="flex items-center">
            <button class="mr-3 mobile-tap-target" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i>
            </button>
            <h1 class="font-bold text-lg truncate">TechNaija</h1>
        </div>
        <div class="flex">
            <button class="mr-4 mobile-tap-target" onclick="shareContent()">
                <i class="fas fa-share-alt"></i>
            </button>
            <button class="mobile-tap-target" id="bookmarkButton" onclick="toggleBookmark()">
                <i class="far fa-bookmark" id="bookmarkIcon"></i>
            </button>
        </div>
    </nav>

    <!-- Course Header -->
    <div class="relative">
        <!-- Featured Video Thumbnail with Play Button -->
        <div class="relative">
            <img src="/image.jpg" alt="Python Programming Course" class="w-full h-56 object-cover sm:h-64">
            <div class="absolute inset-0 flex items-center justify-center">
                <button class="bg-white bg-opacity-80 rounded-full p-4 shadow-lg mobile-tap-target"
                    onclick="playVideo()">
                    <i class="fas fa-play text-indigo-600 text-xl"></i>
                </button>
            </div>
            <div class="absolute bottom-0 right-0 bg-black bg-opacity-70 text-white text-xs px-2 py-1 m-2 rounded">
                1:45 / 12:30
            </div>
        </div>

        <!-- Course Title Section -->
        <div class="p-4 bg-white border-b">
            <h1 class="text-xl font-bold">Python Programming for Beginners</h1>
            <div class="flex items-center mt-2 text-sm">
                <div class="flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span class="ml-1 text-gray-600">4.5 (128 reviews)</span>
                <span class="mx-2 text-gray-400">|</span>
                <span class="text-gray-600">1,245 students</span>
            </div>
            <div class="mt-2 text-sm text-gray-600 flex flex-wrap">
                <span class="mr-4 mb-1"><i class="far fa-clock mr-1"></i> 12 hours</span>
                <span class="mb-1"><i class="fas fa-closed-captioning mr-1"></i> Yoruba, Igbo, Hausa</span>
            </div>
        </div>
    </div>

    <!-- Course Info Tabs -->
    <div class="bg-white mb-2 sticky top-[72px] z-20 shadow-sm">
        <div class="flex border-b">
            <button class="flex-1 py-3 font-medium text-indigo-600 border-b-2 border-indigo-600 tab-button active"
                data-tab="about">
                About
            </button>
            <button class="flex-1 py-3 font-medium text-gray-500 tab-button" data-tab="chapters">
                Chapters
            </button>
            <button class="flex-1 py-3 font-medium text-gray-500 tab-button" data-tab="reviews">
                Reviews
            </button>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="course-content">
        <!-- About Tab Content -->
        <div class="p-4 tab-content active" id="about-content">
            <!-- Course Description -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Course Description</h2>
                <p class="text-gray-700 text-sm">
                    Learn Python programming from scratch in your native language. This comprehensive course covers
                    everything from basic syntax to advanced concepts like object-oriented programming, making it
                    perfect for beginners with no prior coding experience.
                </p>
                <p class="text-gray-700 text-sm mt-2 collapse-text" id="more-description" style="display: none;">
                    All lessons are explained in simple terms with practical examples that relate to everyday Nigerian
                    contexts, making learning relevant and easy to understand. You'll start with the fundamentals and
                    gradually progress to more complex topics, building real-world applications along the way.
                </p>
                <p class="text-gray-700 text-sm mt-2 collapse-text" id="even-more-description" style="display: none;">
                    Each lesson includes coding exercises and projects specifically designed to reinforce your learning
                    and help you apply your skills to solve real problems. By the end of this course, you'll have a
                    solid foundation in Python programming and be able to develop your own applications.
                </p>
                <button class="text-indigo-600 text-sm mt-2 font-medium" id="read-more-btn"
                    onclick="toggleDescription()">Read more</button>
            </div>

            <!-- What You'll Learn -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">What You'll Learn</h2>
                <div class="grid grid-cols-1 gap-3">
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <p class="text-sm text-gray-700">Build real-world Python applications from scratch</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <p class="text-sm text-gray-700">Understand core programming concepts in your native language
                        </p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <p class="text-sm text-gray-700">Set up a professional development environment</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <p class="text-sm text-gray-700">Work with databases and API integrations</p>
                    </div>
                </div>
            </div>

            <!-- Instructor Info -->
            <div class="mb-6 bg-white rounded-lg p-4 shadow-sm">
                <h2 class="text-lg font-semibold mb-3">Your Instructor</h2>
                <div class="flex items-center">
                    <img src="/api/placeholder/100/100" alt="Instructor" class="w-12 h-12 rounded-full object-cover">
                    <div class="ml-3">
                        <h3 class="font-medium">Oluwaseun Adeyemi</h3>
                        <p class="text-sm text-gray-600">Python Developer & Tech Educator</p>
                    </div>
                </div>
                <div class="mt-3 text-sm text-gray-700">
                    <p>10+ years of software development experience with a passion for teaching tech skills in native
                        Nigerian languages.</p>
                </div>
                <button class="text-indigo-600 text-sm mt-2 font-medium" onclick="viewInstructorProfile()">View
                    profile</button>
            </div>

            <!-- Related Courses -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-3">You Might Also Like</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Course Card 1 -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <a href="#" class="block">
                            <img src="/api/placeholder/256/150" alt="Web Development Course"
                                class="w-full h-32 object-cover rounded-t-lg">
                            <div class="p-3">
                                <h3 class="font-medium mb-1">Web Development Basics</h3>
                                <div class="flex items-center text-sm mb-2">
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <span class="ml-1 text-gray-600 text-xs">4.0</span>
                                </div>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="font-bold text-indigo-600">₦5,000</span>
                                    <span class="text-xs text-gray-600">8 hours</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Course Card 2 -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <a href="#" class="block">
                            <img src="/api/placeholder/256/150" alt="Data Analysis Course"
                                class="w-full h-32 object-cover rounded-t-lg">
                            <div class="p-3">
                                <h3 class="font-medium mb-1">Data Analysis with Python</h3>
                                <div class="flex items-center text-sm mb-2">
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="ml-1 text-gray-600 text-xs">4.5</span>
                                </div>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="font-bold text-indigo-600">₦6,500</span>
                                    <span class="text-xs text-gray-600">10 hours</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Course Card 3 -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <a href="#" class="block">
                            <img src="/api/placeholder/256/150" alt="Mobile App Development"
                                class="w-full h-32 object-cover rounded-t-lg">
                            <div class="p-3">
                                <h3 class="font-medium mb-1">Mobile App Development</h3>
                                <div class="flex items-center text-sm mb-2">
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ml-1 text-gray-600 text-xs">5.0</span>
                                </div>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="font-bold text-indigo-600">₦7,000</span>
                                    <span class="text-xs text-gray-600">15 hours</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chapters Tab Content -->
        <div class="p-4 tab-content" id="chapters-content">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Course Content</h2>
                <span class="text-sm text-gray-600">12 chapters • 36 lessons</span>
            </div>

            <!-- Chapter List -->
            <div class="space-y-4">
                <!-- Chapter 1 - Expanded -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-3 border-b cursor-pointer chapter-header" data-chapter="1">
                        <div class="flex justify-between items-center">
                            <h3 class="font-medium">1. Introduction to Python</h3>
                            <button class="text-gray-500 chapter-toggle" data-chapter="1">
                                <i class="fas fa-chevron-up" id="chapter-icon-1"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">3 lessons • 45 min</p>
                    </div>
                    <div class="p-3 space-y-3 bg-gray-50 chapter-content open" id="chapter-content-1">
                        <div class="flex justify-between items-center cursor-pointer" onclick="playLesson('welcome')">
                            <div class="flex items-center">
                                <i class="fas fa-play-circle text-indigo-600 mr-2"></i>
                                <span class="text-sm">Welcome & Course Overview</span>
                            </div>
                            <span class="text-xs text-gray-500">10:15</span>
                        </div>
                        <div class="flex justify-between items-center cursor-pointer" onclick="playLesson('setup')">
                            <div class="flex items-center">
                                <i class="fas fa-play-circle text-indigo-600 mr-2"></i>
                                <span class="text-sm">Installing Python & Setup</span>
                            </div>
                            <span class="text-xs text-gray-500">15:30</span>
                        </div>
                        <div class="flex justify-between items-center cursor-pointer"
                            onclick="playLesson('first-program')">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span class="text-sm">Your First Python Program</span>
                            </div>
                            <span class="text-xs text-gray-500">20:05</span>
                        </div>
                    </div>
                </div>

                <!-- Chapter 2 - Collapsed -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-3 border-b cursor-pointer chapter-header" data-chapter="2">
                        <div class="flex justify-between items-center">
                            <h3 class="font-medium">2. Python Variables & Data Types</h3>
                            <button class="text-gray-500 chapter-toggle" data-chapter="2">
                                <i class="fas fa-chevron-down" id="chapter-icon-2"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">4 lessons • 60 min</p>
                    </div>
                    <div class="p-3 space-y-3 bg-gray-50 chapter-content" id="chapter-content-2">
                        <div class="flex justify-between items-center cursor-pointer"
                            onclick="playLesson('variables')">
                            <div class="flex items-center">
                                <i class="fas fa-play-circle text-indigo-600 mr-2"></i>
                                <span class="text-sm">Understanding Variables</span>
                            </div>
                            <span class="text-xs text-gray-500">15:00</span>
                        </div>
                        <div class="flex justify-between items-center cursor-pointer" onclick="playLesson('strings')">
                            <div class="flex items-center">
                                <i class="fas fa-play-circle text-indigo-600 mr-2"></i>
                                <span class="text-sm">Working with Strings</span>
                            </div>
                            <span class="text-xs text-gray-500">12:45</span>
                        </div>
                        <div class="flex justify-between items-center cursor-pointer" onclick="playLesson('numbers')">
                            <div class="flex items-center">
                                <i class="fas fa-play-circle text-indigo-600 mr-2"></i>
                                <span class="text-sm">Numbers & Basic Math</span>
                            </div>
                            <span class="text-xs text-gray-500">18:20</span>
                        </div>
                        <div class="flex justify-between items-center cursor-pointer" onclick="playLesson('lists')">
                            <div class="flex items-center">
                                <i class="fas fa-play-circle text-indigo-600 mr-2"></i>
                                <span class="text-sm">Lists & Collections</span>
                            </div>
                            <span class="text-xs text-gray-500">14:30</span>
                        </div>
                    </div>
                </div>

                <!-- Chapter 3 - Locked -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-3 border-b cursor-pointer" onclick="showUpgradePrompt()">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <h3 class="font-medium">3. Control Flow & Logic</h3>
                                <span
                                    class="ml-2 bg-gray-200 text-gray-600 text-xs px-2 py-0.5 rounded-full">Locked</span>
                            </div>
                            <button class="text-gray-500">
                                <i class="fas fa-lock"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">5 lessons • 75 min</p>
                    </div>
                </div>

                <!-- Chapter 4 - Locked -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-3 border-b cursor-pointer" onclick="showUpgradePrompt()">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <h3 class="font-medium">4. Functions & Modules</h3>
                                <span
                                    class="ml-2 bg-gray-200 text-gray-600 text-xs px-2 py-0.5 rounded-full">Locked</span>
                            </div>
                            <button class="text-gray-500">
                                <i class="fas fa-lock"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">6 lessons • 90 min</p>
                    </div>
                </div>

                <!-- Chapter 5 - Locked -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-3 border-b cursor-pointer" onclick="showUpgradePrompt()">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <h3 class="font-medium">5. Object-Oriented Programming</h3>
                                <span
                                    class="ml-2 bg-gray-200 text-gray-600 text-xs px-2 py-0.5 rounded-full">Locked</span>
                            </div>
                            <button class="text-gray-500">
                                <i class="fas fa-lock"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">7 lessons • 105 min</p>
                    </div>
                </div>
            </div>

            <button
                class="w-full mt-4 py-3 border border-indigo-600 text-indigo-600 rounded-md text-center font-medium"
                onclick="showAllChapters()">
                Show all chapters
            </button>
        </div>

        <!-- Reviews Tab Content -->
        <div class="p-4 tab-content" id="reviews-content">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Student Reviews</h2>
                <button class="text-indigo-600 text-sm font-medium" onclick="showAllReviews()">View all</button>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4">
                <!-- Review Summary -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                    <div class="mb-4 sm:mb-0">
                        <div class="text-3xl font-bold">4.5</div>
                        <div class="flex text-yellow-400 mt-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <div class="text-sm text-gray-600 mt-1">128 reviews</div>
                    </div>
                    <div class="w-full sm:w-2/3">
                        <!-- Rating Bars -->
                        <div class="flex items-center mb-1">
                            <span class="text-xs w-2 mr-2">5</span>
                            <div class="h-2 bg-gray-200 rounded-full flex-1">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-xs ml-2">75%</span>
                        </div>
                        <div class="flex items-center mb-1">
                            <span class="text-xs w-2 mr-2">4</span>
                            <div class="h-2 bg-gray-200 rounded-full flex-1">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 15%"></div>
                            </div>
                            <span class="text-xs ml-2">15%</span>
                        </div>
                        <div class="flex items-center mb-1">
                            <span class="text-xs w-2 mr-2">3</span>
                            <div class="h-2 bg-gray-200 rounded-full flex-1">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 7%"></div>
                            </div>
                            <span class="text-xs ml-2">7%</span>
                        </div>
                        <div class="flex items-center mb-1">
                            <span class="text-xs w-2 mr-2">2</span>
                            <div class="h-2 bg-gray-200 rounded-full flex-1">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 2%"></div>
                            </div>
                            <span class="text-xs ml-2">2%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-xs w-2 mr-2">1</span>
                            <div class="h-2 bg-gray-200 rounded-full flex-1">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 1%"></div>
                            </div>
                            <span class="text-xs ml-2">1%</span>
                        </div>
                    </div>
                </div>

                <!-- Individual Reviews -->
                <div class="border-t pt-4 space-y-4">
                    <div>
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <img src="/api/placeholder/40/40" alt="Reviewer"
                                    class="w-10 h-10 rounded-full object-cover">
                                <div class="ml-2">
                                    <p class="font-medium text-sm">Chinedu Okonkwo</p>
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500">2 weeks ago</span>
                        </div>
                        <p class="text-sm mt-2">
                            Learning Python in Igbo language made it so much easier for me to understand programming
                            concepts. The examples were practical and related to Nigerian businesses which made it very
                            relevant.
                        </p>
                        <div class="mt-2 flex items-center">
                            <button class="text-gray-500 text-xs flex items-center mr-4" onclick="likeReview(this)">
                                <i class="far fa-thumbs-up mr-1"></i> Helpful (24)
                            </button>
                            <button class="text-gray-500 text-xs flex items-center" onclick="showReplyForm(this)">
                                <i class="far fa-comment mr-1"></i> Reply
                            </button>
                        </div>
                    </div>

                    <div class="border-t pt-4">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <img src="/api/placeholder/40/40" alt="Reviewer"
                                    class="w-10 h-10 rounded-full object-cover">
                                <div class="ml-2">
                                    <p class="font-medium text-sm">Amina Yusuf</p>
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500">1 month ago</span>
                        </div>
                        <p class="text-sm mt-2">
                            The Hausa translation really helped me grasp the fundamentals. Instructor explains things
                            very clearly. The only issue was some technical problems with video playback occasionally.
                        </p>
                        <div class="mt-2 flex items-center">
                            <button class="text-gray-500 text-xs flex items-center mr-4" onclick="likeReview(this)">
                                <i class="far fa-thumbs-up mr-1"></i> Helpful (18)
                            </button>
                            <button class="text-gray-500 text-xs flex items-center" onclick="showReplyForm(this)">
                                <i class="far fa-comment mr-1"></i> Reply
                            </button>
                        </div>
                    </div>

                    <div class="border-t pt-4">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <img src="/api/placeholder/40/40" alt="Reviewer"
                                    class="w-10 h-10 rounded-full object-cover">
                                <div class="ml-2">
                                    <p class="font-medium text-sm">Olumide Johnson</p>
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500">2 months ago</span>
                        </div>
                        <p class="text-sm mt-2">
                            This course is amazing! The Yoruba explanations really helped me understand complex
                            concepts. I've tried other courses before but this is the first one where I feel I'm truly
                            learning. The projects are practical and relevant to my work.
                        </p>
                        <div class="mt-2 flex items-center">
                            <button class="text-gray-500 text-xs flex items-center mr-4" onclick="likeReview(this)">
                                <i class="far fa-thumbs-up mr-1"></i> Helpful (31)
                            </button>
                            <button class="text-gray-500 text-xs flex items-center" onclick="showReplyForm(this)">
                                <i class="far fa-comment mr-1"></i> Reply
                            </button>
                        </div>
                    </div>
                </div>

                <button
                    class="w-full mt-4 py-2 border border-indigo-600 text-indigo-600 rounded-md text-center font-medium"
                    onclick="showAllReviews()">
                    Load more reviews
                </button>
            </div>
        </div>
    </div>

    <!-- Sticky Bottom CTA -->
    <div class="fixed bottom-0 left-0 w-full bg-white border-t p-4 flex items-center justify-between z-30">
        <div>
            <p class="font-bold text-xl text-indigo-600">₦6,000</p>
            <p class="text-xs text-gray-600 line-through">₦10,000</p>
        </div>
        <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium" onclick="enrollNow()">
            Enroll Now
        </button>
    </div>

    <!-- Video Modal -->
    <!-- Updated Video Modal with better positioning and z-index -->
    <div id="videoModal"
        class="fixed inset-0 bg-black bg-opacity-90 z-[9999] hidden flex items-center justify-center">
        <div class="w-full h-full max-w-4xl max-h-[80vh] mx-auto my-auto relative">
            <div class="flex justify-end absolute top-4 right-4 z-[10000]">
                <button onclick="closeVideoModal()"
                    class="text-white p-3 bg-black bg-opacity-60 hover:bg-opacity-80 rounded-full">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div class="w-full h-full flex items-center justify-center">
                <!-- Bunny.net player iframe will be inserted here -->
                <div id="bunnyPlayerContainer" class="w-full h-full"></div>
            </div>
        </div>
    </div>

    <!-- Upgrade Modal -->
    <div id="upgradeModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center">
        <div class="bg-white w-full max-w-md p-4 rounded-lg mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Upgrade to Access</h3>
                <button onclick="closeUpgradeModal()" class="text-gray-500 p-2">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="text-center mb-4">
                <p class="mb-2">This content is locked. Enroll in the course to access all chapters.</p>
                <p class="text-sm text-gray-600">Get full access to all 12 chapters and 36 lessons.</p>
            </div>
            <button onclick="enrollNow()" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-medium">
                Enroll Now for ₦6,000
            </button>
            <p class="text-center text-sm text-gray-600 mt-3">Lifetime access with 30-day money-back guarantee</p>
        </div>
    </div>

    <script>
        // Tab switching functionality
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabName = button.getAttribute('data-tab');

                // Update active tab button
                tabButtons.forEach(btn => {
                    btn.classList.remove('text-indigo-600', 'border-b-2', 'border-indigo-600');
                    btn.classList.add('text-gray-500');
                });
                button.classList.remove('text-gray-500');
                button.classList.add('text-indigo-600', 'border-b-2', 'border-indigo-600');

                // Show active tab content
                tabContents.forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(`${tabName}-content`).classList.add('active');
            });
        });

        // Chapter toggling
        const chapterHeaders = document.querySelectorAll('.chapter-header');
        const chapterToggles = document.querySelectorAll('.chapter-toggle');

        chapterHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const chapterNum = header.getAttribute('data-chapter');
                toggleChapter(chapterNum);
            });
        });

        chapterToggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                e.stopPropagation();
                const chapterNum = toggle.getAttribute('data-chapter');
                toggleChapter(chapterNum);
            });
        });

        function toggleChapter(chapterNum) {
            const content = document.getElementById(`chapter-content-${chapterNum}`);
            const icon = document.getElementById(`chapter-icon-${chapterNum}`);

            if (content.classList.contains('open')) {
                content.classList.remove('open');
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            } else {
                content.classList.add('open');
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            }
        }

        // Read more toggle
        function toggleDescription() {
            const moreText = document.getElementById('more-description');
            const evenMoreText = document.getElementById('even-more-description');
            const readMoreBtn = document.getElementById('read-more-btn');

            if (moreText.style.display === 'none') {
                moreText.style.display = 'block';
                readMoreBtn.textContent = 'Read more';
            } else if (evenMoreText.style.display === 'none') {
                evenMoreText.style.display = 'block';
                readMoreBtn.textContent = 'Read less';
            } else {
                moreText.style.display = 'none';
                evenMoreText.style.display = 'none';
                readMoreBtn.textContent = 'Read more';
            }
        }

        // Video modal
        // Updated functions for better modal handling
        function playVideo() {
            // First create the iframe
            const container = document.getElementById('bunnyPlayerContainer');
            container.innerHTML = '';

            const iframe = document.createElement('iframe');
            iframe.src = "https://iframe.mediadelivery.net/play/396430/eace5ce5-e909-4b1a-86df-e52f82ddd756";
            iframe.style.width = "100%";
            iframe.style.height = "100%";
            iframe.style.border = "none";
            iframe.style.borderRadius = "4px";
            iframe.allow = "accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;";
            iframe.allowFullscreen = true;

            container.appendChild(iframe);

            // Then show the modal
            const modal = document.getElementById('videoModal');
            modal.style.display = "flex";
            document.body.style.overflow = 'hidden';
        }

        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            modal.style.display = "none";
            document.body.style.overflow = 'auto';

            // Clear the iframe when closing to stop playback
            document.getElementById('bunnyPlayerContainer').innerHTML = '';
        }

        // Upgrade modal
        function showUpgradePrompt() {
            document.getElementById('upgradeModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeUpgradeModal() {
            document.getElementById('upgradeModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Lesson playing
        function playLesson(lessonId) {
            console.log(`Playing lesson: ${lessonId}`);
            playVideo();
        }

        // Enroll now button
        function enrollNow() {
            alert('Enrolling you in the course!');
            closeUpgradeModal();
        }

        // Show all chapters button
        function showAllChapters() {
            alert('Showing all chapters!');
        }

        // Show all reviews
        function showAllReviews() {
            alert('Showing all reviews!');
        }

        // Like review
        function likeReview(button) {
            const text = button.textContent;
            const currentCount = parseInt(text.match(/\d+/)[0]);
            const newCount = currentCount + 1;
            button.innerHTML = `<i class="fas fa-thumbs-up mr-1"></i> Helpful (${newCount})`;
        }

        // Show reply form
        function showReplyForm(button) {
            const parent = button.closest('div').parentNode;

            // Remove any existing reply forms
            const existingForms = document.querySelectorAll('.reply-form');
            existingForms.forEach(form => form.remove());

            // Create new reply form
            const replyForm = document.createElement('div');
            replyForm.className = 'mt-3 reply-form';
            replyForm.innerHTML = `
                <textarea class="w-full border rounded-lg p-2 text-sm" placeholder="Write your reply..."></textarea>
                <div class="flex justify-end mt-2">
                    <button class="bg-gray-200 text-gray-800 px-3 py-1 rounded mr-2 text-sm" onclick="this.parentNode.parentNode.remove()">Cancel</button>
                    <button class="bg-indigo-600 text-white px-3 py-1 rounded text-sm" onclick="submitReply(this)">Reply</button>
                </div>
            `;
            parent.appendChild(replyForm);
        }

        // Submit reply
        function submitReply(button) {
            alert('Reply submitted!');
            button.closest('.reply-form').remove();
        }

        // Bookmark functionality
        function toggleBookmark() {
            const icon = document.getElementById('bookmarkIcon');
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
            }
        }

        // Share functionality
        function shareContent() {
            if (navigator.share) {
                navigator.share({
                    title: 'Python Programming for Beginners',
                    text: 'Check out this amazing Python course on TechNaija!',
                    url: window.location.href
                }).then(() => {
                    console.log('Thanks for sharing!');
                }).catch(console.error);
            } else {
                alert('Share this course: ' + window.location.href);
            }
        }

        // View instructor profile
        function viewInstructorProfile() {
            alert('Viewing instructor profile!');
        }
    </script>
</body>

</html>
