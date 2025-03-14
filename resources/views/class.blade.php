<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Classroom Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f9fc;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Progress bar animation */
        @keyframes progressAnimation {
            0% {
                width: 0;
            }

            100% {
                width: 45%;
            }
        }

        .progress-bar-animate {
            animation: progressAnimation 1s ease-in-out forwards;
        }

        /* Mobile navigation */
        .bottom-nav {
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Video player */
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }

        .video-container iframe,
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 8px;
        }

        /* Chapter sidebar */
        .chapter-sidebar {
            max-height: calc(100vh - 100px);
            overflow-y: auto;
        }

        /* Action buttons */
        .action-buttons {
            transition: all 0.3s ease;
        }

        .action-button {
            transition: all 0.2s ease;
        }

        .action-button:hover {
            transform: translateY(-2px);
        }

        /* Dropdown menu */
        .dropdown-menu {
            transform-origin: top right;
            transition: all 0.2s ease;
        }

        /* Mobile optimizations */
        @media (max-width: 768px) {
            .chapter-sidebar {
                max-height: 70vh;
            }
        }

        /* Sidebar collapse animation */
        .sidebar-collapse-enter-active,
        .sidebar-collapse-leave-active {
            transition: transform 0.3s ease-out;
        }

        .sidebar-collapse-enter-from,
        .sidebar-collapse-leave-to {
            transform: translateX(-100%);
        }

        /* Hide mobile bottom tabs on desktop */
        @media (min-width: 769px) {
            .mobile-tabs {
                display: none;
            }
        }

        /* Hide desktop tabs on mobile */
        @media (max-width: 768px) {
            .desktop-tabs {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-gray-50" x-data="{
    activeTab: 'overview',
    sidebarOpen: false,
    menuOpen: false,
    progress: 45,
    currentChapter: 2,
    currentLesson: 3,
    showNotes: false,
    chaptersData: [{
            id: 1,
            title: 'Introduction to Course',
            completed: true,
            lessons: [
                { id: 1, title: 'Welcome & Course Overview', duration: '5:30', completed: true },
                { id: 2, title: 'How to Use This Platform', duration: '8:15', completed: true },
                { id: 3, title: 'Setting Up Your Learning Environment', duration: '10:45', completed: true }
            ]
        },
        {
            id: 2,
            title: 'Fundamentals & Core Concepts',
            completed: false,
            lessons: [
                { id: 1, title: 'Basic Principles', duration: '12:20', completed: true },
                { id: 2, title: 'Key Terminology', duration: '9:45', completed: true },
                { id: 3, title: 'Practical Applications', duration: '15:30', completed: false },
                { id: 4, title: 'Common Challenges', duration: '11:00', completed: false }
            ]
        },
        {
            id: 3,
            title: 'Advanced Techniques',
            completed: false,
            lessons: [
                { id: 1, title: 'Specialized Approaches', duration: '14:30', completed: false },
                { id: 2, title: 'Case Studies', duration: '18:20', completed: false },
                { id: 3, title: 'Industry Best Practices', duration: '16:15', completed: false }
            ]
        },
        {
            id: 4,
            title: 'Implementation & Practical Projects',
            completed: false,
            lessons: [
                { id: 1, title: 'Project Setup', duration: '9:40', completed: false },
                { id: 2, title: 'Core Implementation', duration: '22:15', completed: false },
                { id: 3, title: 'Testing & Validation', duration: '14:50', completed: false },
                { id: 4, title: 'Final Submission', duration: '7:30', completed: false }
            ]
        },
        {
            id: 5,
            title: 'Course Conclusion & Next Steps',
            completed: false,
            lessons: [
                { id: 1, title: 'Course Summary', duration: '10:15', completed: false },
                { id: 2, title: 'Additional Resources', duration: '8:40', completed: false },
                { id: 3, title: 'Certification Process', duration: '6:55', completed: false }
            ]
        }
    ]
}">
    <!-- Mobile Top Navigation -->
    <div
        class="md:hidden bg-white border-b border-gray-200 flex items-center justify-between px-4 py-3 sticky top-0 z-30">
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-700 focus:outline-none">
            <i class="fas" :class="sidebarOpen ? 'fa-times' : 'fa-bars'"></i>
        </button>
        <h1 class="text-lg font-semibold text-gray-800 truncate">Advanced Learning Course</h1>
        <div class="relative">
            <button @click="menuOpen = !menuOpen" class="text-gray-700 focus:outline-none">
                <i class="fas fa-ellipsis-v text-lg"></i>
            </button>

            <!-- Mobile Menu Dropdown -->
            <div x-show="menuOpen" @click.away="menuOpen = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Courses
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-download mr-2"></i> Download Materials
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-share-alt mr-2"></i> Share Course
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-cog mr-2"></i> Settings
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-question-circle mr-2"></i> Help Center
                </a>
            </div>
        </div>
    </div>

    <!-- Overlay for Mobile Sidebar -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
        class="md:hidden fixed inset-0 bg-gray-800 bg-opacity-50 z-20"></div>

    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="md:hidden fixed inset-y-0 left-0 w-4/5 max-w-xs bg-white z-30 transform"
            @click.away="sidebarOpen = false">

            <!-- Mobile Sidebar Content -->
            <div class="h-full flex flex-col">
                <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                    <h1 class="text-lg font-semibold text-gray-800">Course Content</h1>
                    <button @click="sidebarOpen = false" class="text-gray-700 focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Progress Bar -->
                <div class="p-4 border-b border-gray-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-600">Course Progress</span>
                        <span class="text-sm font-medium text-blue-600">45%</span>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full">
                        <div class="h-2 bg-blue-600 rounded-full progress-bar-animate" style="width: 45%"></div>
                    </div>
                </div>

                <!-- Chapters -->
                <div class="flex-1 overflow-y-auto p-4">
                    <template x-for="chapter in chaptersData" :key="chapter.id">
                        <div class="mb-4">
                            <div class="flex items-center justify-between py-2 px-3 rounded-lg cursor-pointer"
                                @click="chapter.id === currentChapter ? currentChapter = null : currentChapter = chapter.id"
                                :class="{ 'bg-blue-50': chapter.id === currentChapter, 'hover:bg-gray-100': chapter.id !==
                                        currentChapter }">
                                <div class="flex items-center">
                                    <div class="mr-3 w-6 h-6 flex items-center justify-center rounded-full"
                                        :class="{ 'bg-green-500': chapter.completed, 'bg-gray-200': !chapter.completed }">
                                        <i class="fas fa-check text-xs text-white" x-show="chapter.completed"></i>
                                        <span class="text-xs text-gray-600" x-show="!chapter.completed"
                                            x-text="chapter.id"></span>
                                    </div>
                                    <span class="font-medium text-gray-800" x-text="chapter.title"></span>
                                </div>
                                <i class="fas"
                                    :class="{ 'fa-chevron-down': chapter.id === currentChapter, 'fa-chevron-right': chapter
                                            .id !== currentChapter }"></i>
                            </div>

                            <!-- Lessons -->
                            <div x-show="chapter.id === currentChapter"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0" class="ml-8 mt-2">
                                <template x-for="lesson in chapter.lessons" :key="lesson.id">
                                    <div class="flex items-center py-2 px-3 rounded-lg cursor-pointer"
                                        :class="{ 'bg-blue-100': chapter.id === currentChapter && lesson.id ===
                                            currentLesson, 'hover:bg-gray-100': !(chapter.id === currentChapter &&
                                                lesson.id === currentLesson) }">
                                        <div class="mr-3 w-5 h-5 flex items-center justify-center rounded-full"
                                            :class="{ 'bg-green-500': lesson.completed, 'bg-gray-200': !lesson.completed }">
                                            <i class="fas fa-check text-xs text-white" x-show="lesson.completed"></i>
                                            <span class="text-xs text-gray-600" x-show="!lesson.completed"
                                                x-text="lesson.id"></span>
                                        </div>
                                        <div class="flex-1">
                                            <span class="text-sm font-medium text-gray-800"
                                                x-text="lesson.title"></span>
                                            <div class="flex items-center mt-1">
                                                <i class="far fa-clock text-xs text-gray-500 mr-1"></i>
                                                <span class="text-xs text-gray-500" x-text="lesson.duration"></span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Desktop Sidebar (always visible on desktop) -->
        <div class="hidden md:block md:w-72 bg-white border-r border-gray-200">
            <!-- Course Title -->
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                <h1 class="text-lg font-semibold text-gray-800">Advanced Learning Course</h1>
                <button @click="collapsed = !collapsed" class="text-gray-700 focus:outline-none">
                    <i class="fas fa-compress-alt"></i>
                </button>
            </div>

            <!-- Progress Bar -->
            <div class="p-4 border-b border-gray-200">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-600">Course Progress</span>
                    <span class="text-sm font-medium text-blue-600">45%</span>
                </div>
                <div class="h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-blue-600 rounded-full progress-bar-animate" style="width: 45%"></div>
                </div>
            </div>

            <!-- Chapters -->
            <div class="chapter-sidebar p-4">
                <template x-for="chapter in chaptersData" :key="chapter.id">
                    <div class="mb-4">
                        <div class="flex items-center justify-between py-2 px-3 rounded-lg cursor-pointer"
                            @click="chapter.id === currentChapter ? currentChapter = null : currentChapter = chapter.id"
                            :class="{ 'bg-blue-50': chapter.id === currentChapter, 'hover:bg-gray-100': chapter.id !==
                                    currentChapter }">
                            <div class="flex items-center">
                                <div class="mr-3 w-6 h-6 flex items-center justify-center rounded-full"
                                    :class="{ 'bg-green-500': chapter.completed, 'bg-gray-200': !chapter.completed }">
                                    <i class="fas fa-check text-xs text-white" x-show="chapter.completed"></i>
                                    <span class="text-xs text-gray-600" x-show="!chapter.completed"
                                        x-text="chapter.id"></span>
                                </div>
                                <span class="font-medium text-gray-800" x-text="chapter.title"></span>
                            </div>
                            <i class="fas"
                                :class="{ 'fa-chevron-down': chapter.id === currentChapter, 'fa-chevron-right': chapter.id !==
                                        currentChapter }"></i>
                        </div>

                        <!-- Lessons -->
                        <div x-show="chapter.id === currentChapter"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0" class="ml-8 mt-2">
                            <template x-for="lesson in chapter.lessons" :key="lesson.id">
                                <div class="flex items-center py-2 px-3 rounded-lg cursor-pointer"
                                    :class="{ 'bg-blue-100': chapter.id === currentChapter && lesson.id ===
                                        currentLesson, 'hover:bg-gray-100': !(chapter.id === currentChapter && lesson
                                            .id === currentLesson) }">
                                    <div class="mr-3 w-5 h-5 flex items-center justify-center rounded-full"
                                        :class="{ 'bg-green-500': lesson.completed, 'bg-gray-200': !lesson.completed }">
                                        <i class="fas fa-check text-xs text-white" x-show="lesson.completed"></i>
                                        <span class="text-xs text-gray-600" x-show="!lesson.completed"
                                            x-text="lesson.id"></span>
                                    </div>
                                    <div class="flex-1">
                                        <span class="text-sm font-medium text-gray-800" x-text="lesson.title"></span>
                                        <div class="flex items-center mt-1">
                                            <i class="far fa-clock text-xs text-gray-500 mr-1"></i>
                                            <span class="text-xs text-gray-500" x-text="lesson.duration"></span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4 md:p-6">
            <!-- Top Progress Bar -->
            <div class="mb-4 px-1">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-600">Lesson Progress</span>
                    <span class="text-sm font-medium text-blue-600">80%</span>
                </div>
                <div class="h-1 bg-gray-200 rounded-full">
                    <div class="h-1 bg-blue-600 rounded-full" style="width: 80%"></div>
                </div>
            </div>

            <!-- Video Player -->
            <div class="video-container mb-6 shadow-md">
                <video controls class="rounded-lg shadow-lg">
                    <source src="/api/placeholder/640/360" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Lesson Title -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Practical Applications</h2>
                <div class="flex items-center mt-2">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="far fa-clock mr-1"></i>
                        <span>15:30</span>
                    </div>
                    <div class="flex items-center ml-4 text-sm text-gray-600">
                        <i class="far fa-file-alt mr-1"></i>
                        <span>Lesson 3 of 4</span>
                    </div>
                </div>
            </div>

            <!-- Tab Navigation (Desktop Only) -->
            <div class="desktop-tabs mb-4 border-b border-gray-200">
                <div class="flex overflow-x-auto hide-scrollbar">
                    <button @click="activeTab = 'overview'" class="px-4 py-2 font-medium text-sm whitespace-nowrap"
                        :class="activeTab === 'overview' ? 'text-blue-600 border-b-2 border-blue-600' :
                            'text-gray-600 hover:text-gray-800'">
                        Course Overview
                    </button>
                    <button @click="activeTab = 'discussion'" class="px-4 py-2 font-medium text-sm whitespace-nowrap"
                        :class="activeTab === 'discussion' ? 'text-blue-600 border-b-2 border-blue-600' :
                            'text-gray-600 hover:text-gray-800'">
                        Discussion Forum
                    </button>
                    <button @click="activeTab = 'notes'" class="px-4 py-2 font-medium text-sm whitespace-nowrap"
                        :class="activeTab === 'notes' ? 'text-blue-600 border-b-2 border-blue-600' :
                            'text-gray-600 hover:text-gray-800'">
                        Notes
                    </button>
                    <button @click="activeTab = 'resources'" class="px-4 py-2 font-medium text-sm whitespace-nowrap"
                        :class="activeTab === 'resources' ? 'text-blue-600 border-b-2 border-blue-600' :
                            'text-gray-600 hover:text-gray-800'">
                        Resources
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="bg-white p-4 rounded-lg shadow-sm">
                <!-- Overview Tab -->
                <div x-show="activeTab === 'overview'" class="animate-fade-in">
                    <p class="text-gray-700">This lesson covers practical applications of the core concepts we've
                        learned. You'll discover how to implement these ideas in real-world scenarios and gain hands-on
                        experience through guided examples.</p>
                    <p class="text-gray-700 mt-3">By the end of this lesson, you should be able to:</p>
                    <ul class="list-disc ml-5 mt-2 text-gray-700">
                        <li class="mb-1">Apply fundamental principles to solve common problems</li>
                        <li class="mb-1">Identify appropriate use cases for different techniques</li>
                        <li class="mb-1">Adapt theoretical concepts to practical situations</li>
                        <li class="mb-1">Evaluate the effectiveness of implementation methods</li>
                    </ul>
                </div>

                <!-- Discussion Tab -->
                <div x-show="activeTab === 'discussion'" class="animate-fade-in">
                    <div class="mb-5">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Discussion Forum</h3>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <div class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    <span class="font-semibold text-blue-700">JD</span>
                                </div>
                                <div>
                                    <div class="flex items-center">
                                        <h4 class="font-medium text-gray-800">John Doe</h4>
                                        <span class="text-xs text-gray-500 ml-2">2 days ago</span>
                                    </div>
                                    <p class="text-gray-700 mt-1">Has anyone found good examples for the third practice
                                        exercise? I'm struggling with the implementation part.</p>
                                    <div class="flex items-center mt-2">
                                        <button class="text-sm text-gray-500 hover:text-blue-600 flex items-center">
                                            <i class="far fa-comment mr-1"></i> Reply
                                        </button>
                                        <span class="mx-2 text-gray-300">|</span>
                                        <button class="text-sm text-gray-500 hover:text-blue-600 flex items-center">
                                            <i class="far fa-heart mr-1"></i> Like
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <textarea class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Add to the discussion..."></textarea>
                        <button
                            class="mt-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-all">
                            Post Comment
                        </button>
                    </div>
                </div>

                <!-- Notes Tab -->
                <div x-show="activeTab === 'notes'" class="animate-fade-in">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">My Notes</h3>
                    <textarea class="w-full h-48 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="Take notes as you watch the lesson..."></textarea>
                    <button class="mt-3 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-all">
                        Save Notes
                    </button>
                </div>

                <!-- Resources Tab -->
                <div x-show="activeTab === 'resources'" class="animate-fade-in">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Additional Resources</h3>
                    <div class="space-y-3">
                        <a href="#"
                            class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <i class="far fa-file-pdf text-red-500 text-xl mr-3"></i>
                            <div>
                                <span class="block font-medium text-gray-800">Practical Examples Guide</span>
                                <span class="text-sm text-gray-500">PDF, 2.4 MB</span>
                            </div>
                        </a>
                        <a href="#"
                            class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <i class="far fa-file-code text-blue-500 text-xl mr-3"></i>
                            <div>
                                <span class="block font-medium text-gray-800">Example Code Files</span>
                                <span class="text-sm text-gray-500">ZIP, 1.8 MB</span>
                            </div>
                        </a>
                        <a href="#"
                            class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <i class="far fa-file-excel text-green-500 text-xl mr-3"></i>
                            <div>
                                <span class="block font-medium text-gray-800">Data Templates</span>
                                <span class="text-sm text-gray-500">XLSX, 540 KB</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons (Desktop) -->
    <div class="hidden md:flex fixed right-8 bottom-8 z-10 action-buttons space-x-3">
        <button @click="showNotes = !showNotes"
            class="action-button bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-3 rounded-lg shadow-lg transition-all flex items-center">
            <i class="fas fa-sticky-note mr-2"></i>
            <span>Quick Notes</span>
        </button>
        <button
            class="action-button bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg shadow-lg transition-all flex items-center">
            <i class="fas fa-arrow-right mr-2"></i>
            <span>Next Lesson</span>
        </button>
    </div>

    <!-- Notes Panel (Slide-in) - Desktop only -->
    <div class="hidden md:block fixed right-0 top-0 h-full w-80 bg-white shadow-lg transform transition-transform duration-300 z-20"
        :class="showNotes ? 'translate-x-0' : 'translate-x-full'">
        <div class="p-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="font-semibold text-gray-800">Quick Notes</h3>
            <button @click="showNotes = false" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-4">
            <textarea class="w-full h-64 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Take your notes here..."></textarea>
            <button class="mt-3 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-all">
                Save Notes
            </button>
        </div>
    </div>

    <!-- Mobile Bottom Navigation -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-30 bottom-nav">
        <div class="grid grid-cols-4 gap-1 px-2 py-2">
            <button @click="sidebarOpen = true; activeTab = 'overview'"
                class="flex flex-col items-center justify-center py-2">
                <i class="fas fa-list text-lg"
                    :class="activeTab === 'overview' ? 'text-blue-600' : 'text-gray-700'"></i>
                <span class="text-xs mt-1"
                    :class="activeTab === 'overview' ? 'text-blue-600' : 'text-gray-600'">Chapters</span>
            </button>
            <button @click="activeTab = 'discussion'" class="flex flex-col items-center justify-center py-2">
                <i class="fas fa-comments text-lg"
                    :class="activeTab === 'discussion' ? 'text-blue-600' : 'text-gray-700'"></i>
                <span class="text-xs mt-1"
                    :class="activeTab === 'discussion' ? 'text-blue-600' : 'text-gray-600'">Discussion</span>
            </button>
            <button @click="activeTab = 'notes'" class="flex flex-col items-center justify-center py-2">
                <i class="fas fa-sticky-note text-lg"
                    :class="activeTab === 'notes' ? 'text-blue-600' : 'text-gray-700'"></i>
                <span class="text-xs mt-1"
                    :class="activeTab === 'notes' ? 'text-blue-600' : 'text-gray-600'">Notes</span>
            </button>
            <button @click="activeTab = 'resources'" class="flex flex-col items-center justify-center py-2">
                <i class="fas fa-download text-lg"
                    :class="activeTab === 'resources' ? 'text-blue-600' : 'text-gray-700'"></i>
                <span class="text-xs mt-1"
                    :class="activeTab === 'resources' ? 'text-blue-600' : 'text-gray-600'">Resources</span>
            </button>
        </div>

        <!-- Next Lesson Button (Mobile) -->
        <div class="fixed right-4 bottom-20 z-30">
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg flex items-center justify-center">
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
</body>

</html>
