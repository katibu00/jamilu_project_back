<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koyify - Instructor Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
                position: fixed;
                z-index: 50;
                top: 0;
                left: 0;
                width: 80%;
                max-width: 300px;
                height: 100vh;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 40;
            }
            .overlay.show {
                display: block;
            }
            .logo-container {
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Mobile overlay -->
    <div id="overlay" class="overlay"></div>
    
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar bg-white w-64 flex-shrink-0 border-r border-gray-200 fixed inset-y-0 left-0 z-20 md:relative md:translate-x-0">
            <div class="flex flex-col h-full">
                <!-- Logo and Close Button -->
                <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                    <a href="/" class="flex items-center">
                        <svg class="w-8 h-8 mr-2" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 5L30 10V30L20 35L10 30V10L20 5Z" fill="#0A2463" />
                            <path d="M20 5L30 10V20L20 25L10 20V10L20 5Z" fill="#3E92CC" />
                            <path d="M20 15L25 17.5V25L20 27.5L15 25V17.5L20 15Z" fill="#1CA664" />
                        </svg>
                        <span class="text-2xl font-extrabold tracking-tight">
                            <span class="text-blue-900">Koyi</span>
                            <span class="text-green-600">fy</span>
                        </span>
                    </a>
                    <button id="close-sidebar" class="md:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
                        <i class="fas fa-times w-5 h-5"></i>
                    </button>
                </div>
                
                <!-- Menu -->
                <div class="py-4 flex-grow overflow-y-auto">
                  @include('layouts.sidebar')
                </div>
                
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="flex items-center justify-between bg-white px-4 py-3 border-b border-gray-200">
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-600 focus:outline-none">
                    <i class="fas fa-bars w-6 h-6"></i>
                </button>
                
                <div class="md:hidden logo-container flex justify-start">
                    <a href="/" class="flex items-center">
                        <svg class="w-8 h-8 mr-2" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 5L30 10V30L20 35L10 30V10L20 5Z" fill="#0A2463" />
                            <path d="M20 5L30 10V20L20 25L10 20V10L20 5Z" fill="#3E92CC" />
                            <path d="M20 15L25 17.5V25L20 27.5L15 25V17.5L20 15Z" fill="#1CA664" />
                        </svg>
                        <span class="text-xl font-extrabold tracking-tight">
                            <span class="text-blue-900">Koyi</span>
                            <span class="text-green-600">fy</span>
                        </span>
                    </a>
                </div>
                
                <!-- Search Bar -->
                <div class="hidden md:flex md:flex-1 px-4">
                    <div class="relative max-w-md w-full">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </span>
                        <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-gray-50 placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Search...">
                    </div>
                </div>
                
                <!-- Header Right Items -->
                <div class="flex items-center space-x-4">
                    <!-- Notification -->
                    <div class="relative">
                        <button id="notification-button" class="p-1 text-gray-600 hover:text-gray-900 focus:outline-none">
                            <i class="fas fa-bell w-6 h-6"></i>
                            <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </button>
                        
                        <!-- Notification Dropdown -->
                        <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 z-50">
                            <div class="px-4 py-2 border-b border-gray-100">
                                <h3 class="text-sm font-medium text-gray-700">Notifications</h3>
                            </div>
                            <div class="px-4 py-3 text-center text-sm text-gray-500">
                                No new notifications
                            </div>
                        </div>
                    </div>
                    
                    <!-- User Dropdown -->
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center focus:outline-none">
                            <img src="/api/placeholder/32/32" alt="User" class="w-8 h-8 rounded-full">
                            <span class="hidden md:block ml-2 text-sm font-medium text-gray-700">John Doe</span>
                            <i class="fas fa-chevron-down ml-1 text-gray-400 text-xs"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Account Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Help Center</a>
                            <div class="border-t border-gray-100"></div>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Main Content Area -->
            @yield('content')
        </div>
    </div>
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('overlay').classList.toggle('show');
        });
        
        // Close sidebar button
        document.getElementById('close-sidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('overlay').classList.remove('show');
        });
        
        // Close sidebar when clicking overlay
        document.getElementById('overlay').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('overlay').classList.remove('show');
        });
        
        // User dropdown toggle
        document.getElementById('user-menu-button').addEventListener('click', function(e) {
            e.stopPropagation();
            document.getElementById('user-dropdown').classList.toggle('hidden');
            document.getElementById('notification-dropdown').classList.add('hidden');
        });
        
        // Notification dropdown toggle
        document.getElementById('notification-button').addEventListener('click', function(e) {
            e.stopPropagation();
            document.getElementById('notification-dropdown').classList.toggle('hidden');
            document.getElementById('user-dropdown').classList.add('hidden');
        });
        
        // Close dropdowns when clicking outside
        window.addEventListener('click', function() {
            document.getElementById('user-dropdown').classList.add('hidden');
            document.getElementById('notification-dropdown').classList.add('hidden');
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
        

    @stack('scripts')
</body>
</html>