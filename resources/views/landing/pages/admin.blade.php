<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Koyify Student Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Poppins', sans-serif;
    }
    
    .course-progress {
      height: 8px;
      border-radius: 4px;
    }
    
    .course-card {
      transition: all 0.3s ease;
      border-radius: 12px;
    }
    
    .course-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .welcome-gradient {
      background: linear-gradient(135deg, #0A2463 0%, #3E92CC 100%);
    }
    
    .sidebar-item:hover .sidebar-icon {
      transform: translateX(3px);
    }
    
    .sidebar-icon {
      transition: all 0.2s ease;
    }
    
    .dropdown-animation {
      animation: slideDown 0.2s ease-out;
    }
    
    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .notification-dot {
      top: -2px;
      right: -2px;
    }
    
    .mobile-menu {
      transition: all 0.3s ease;
    }
    
    .nav-active {
      color: #0A2463;
      background-color: rgba(62, 146, 204, 0.1);
      border-left: 3px solid #0A2463;
    }
    
    .stats-card {
      transition: all 0.3s ease;
    }
    
    .stats-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 15px rgba(0,0,0,0.05);
    }
    
    .activity-item {
      transition: all 0.2s ease;
    }
    
    .activity-item:hover {
      background-color: rgba(62, 146, 204, 0.05);
    }
  </style>
</head>
<body class="bg-gray-50 font-sans">
  <div class="min-h-screen flex flex-col">
    <!-- Mobile Header -->
    <header class="lg:hidden bg-white shadow-md sticky top-0 z-30">
      <div class="flex justify-between items-center p-4">
        <div class="flex items-center">
          <button id="mobile-menu-button" class="mr-4 text-gray-600 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
          </button>
          <!-- Logo -->
          <div class="flex items-center">
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
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <!-- Notification Bell -->
          <div class="relative">
            <button id="mobile-notification-button" class="text-gray-600 focus:outline-none">
              <i class="fas fa-bell text-xl"></i>
              <span class="absolute notification-dot h-2 w-2 bg-red-500 rounded-full"></span>
            </button>
          </div>
          
          <!-- Language Selector -->
          <div class="relative">
            <button class="flex items-center space-x-1 bg-gray-100 px-3 py-1 rounded-md">
              <span class="font-medium text-gray-700">EN</span>
              <i class="fas fa-chevron-down text-xs text-gray-500"></i>
            </button>
            <div class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg hidden dropdown-animation z-50" id="language-dropdown-mobile">
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">English</a>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Hausa</a>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Yoruba</a>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Igbo</a>
            </div>
          </div>
          
          <!-- User Avatar with Dropdown -->
          <div class="relative">
            <button id="mobile-user-menu-button" class="w-10 h-10 bg-gradient-to-r from-blue-900 to-blue-700 rounded-full flex items-center justify-center text-white">
              <span class="font-medium">AM</span>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden dropdown-animation z-50" id="user-dropdown-mobile">
              <div class="border-b border-gray-100 px-4 py-3">
                <p class="font-medium text-gray-800">Aminu Mohammed</p>
                <p class="text-sm text-gray-500">student@koyify.com</p>
              </div>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">
                <i class="fas fa-user mr-2 text-gray-500"></i> My Profile
              </a>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">
                <i class="fas fa-cog mr-2 text-gray-500"></i> Account Settings
              </a>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">
                <i class="fas fa-question-circle mr-2 text-gray-500"></i> Help Center  
              </a>
              <a href="#" class="block px-4 py-2 text-red-600 hover:bg-red-50 border-t border-gray-100">
                <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Mobile Notification Panel -->
      <div id="notification-panel-mobile" class="absolute top-full left-0 right-0 bg-white shadow-lg p-4 hidden dropdown-animation z-40">
        <div class="flex justify-between items-center mb-3">
          <h3 class="font-semibold text-gray-800">Notifications</h3>
          <button class="text-blue-600 text-sm">Mark all as read</button>
        </div>
        <div class="flex items-center justify-center p-6 text-gray-500">
          <div class="text-center">
            <i class="fas fa-bell-slash text-3xl mb-2 text-gray-300"></i>
            <p>No new notifications</p>
          </div>
        </div>
      </div>
    </header>

    <!-- Mobile Sidebar (hidden by default) -->
    <div class="lg:hidden fixed inset-0 z-40 bg-black bg-opacity-50 hidden" id="mobile-menu-overlay"></div>
    <aside id="mobile-menu" class="lg:hidden fixed left-0 top-0 bottom-0 w-72 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-50 mobile-menu">
      <div class="p-5">
        <div class="flex items-center justify-between mb-8">
          <!-- Logo -->
          <div class="flex items-center">
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
          </div>
          <button id="close-mobile-menu" class="text-gray-500 focus:outline-none">
            <i class="fas fa-times"></i>
          </button>
        </div>
        
        <!-- User Profile Summary -->
        <div class="mb-6 pb-6 border-b border-gray-100">
          <div class="flex items-center space-x-3">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-blue-700 rounded-full flex items-center justify-center text-white">
              <span class="font-medium">AM</span>
            </div>
            <div>
              <h3 class="font-semibold text-gray-800">Aminu Mohammed</h3>
              <p class="text-sm text-gray-500">Student</p>
            </div>
          </div>
        </div>
        
        <nav>
          <ul class="space-y-1">
            <li>
              <a href="#" class="flex items-center space-x-3 text-blue-900 bg-blue-50 px-4 py-3 rounded-md border-l-3 border-blue-900 sidebar-item">
                <i class="fas fa-home sidebar-icon"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
                <i class="fas fa-book sidebar-icon"></i>
                <span>My Courses</span>
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
                <i class="fas fa-calendar-alt sidebar-icon"></i>
                <span>Schedule</span>
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
                <i class="fas fa-certificate sidebar-icon"></i>
                <span>Certificates</span>
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
                <i class="fas fa-chart-line sidebar-icon"></i>
                <span>Performance</span>
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
                <i class="fas fa-cog sidebar-icon"></i>
                <span>Settings</span>
              </a>
            </li>
          </ul>
        </nav>
        
        <!-- Help Section -->
        <div class="mt-10 pt-6 border-t border-gray-100">
          <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
            <i class="fas fa-question-circle sidebar-icon"></i>
            <span>Help & Support</span>
          </a>
          <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
            <i class="fas fa-sign-out-alt sidebar-icon"></i>
            <span>Logout</span>
          </a>
        </div>
      </div>
    </aside>

    <div class="flex flex-1">
      <!-- Desktop Sidebar -->
      <aside class="hidden lg:block w-72 bg-white border-r border-gray-200 sticky top-0 h-screen">
        <div class="p-6 flex flex-col h-full">
          <div class="flex items-center space-x-3 mb-10">
            <!-- Logo -->
            <a href="/" class="flex items-center">
              <svg class="w-10 h-10 mr-2" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 5L30 10V30L20 35L10 30V10L20 5Z" fill="#0A2463" />
                <path d="M20 5L30 10V20L20 25L10 20V10L20 5Z" fill="#3E92CC" />
                <path d="M20 15L25 17.5V25L20 27.5L15 25V17.5L20 15Z" fill="#1CA664" />
              </svg>
              <span class="text-2xl font-extrabold tracking-tight">
                <span class="text-blue-900">Koyi</span>
                <span class="text-green-600">fy</span>
              </span>
            </a>
          </div>
          
          <!-- User Profile Summary -->
          <div class="mb-8 pb-6 border-b border-gray-100">
            <div class="flex items-center space-x-3">
              <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-blue-700 rounded-full flex items-center justify-center text-white">
                <span class="font-medium">AM</span>
              </div>
              <div>
                <h3 class="font-semibold text-gray-800">Aminu Mohammed</h3>
                <p class="text-sm text-gray-500">Student</p>
              </div>
            </div>
          </div>
          
          <nav class="flex-1">
            <ul class="space-y-1">
              <li>
                <a href="#" class="flex items-center space-x-3 text-blue-900 bg-blue-50 px-4 py-3 rounded-md border-l-3 border-blue-900 sidebar-item">
                  <i class="fas fa-home sidebar-icon"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
                  <i class="fas fa-book sidebar-icon"></i>
                  <span>My Courses</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
                  <i class="fas fa-calendar-alt sidebar-icon"></i>
                  <span>Schedule</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
                  <i class="fas fa-certificate sidebar-icon"></i>
                  <span>Certificates</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
                  <i class="fas fa-chart-line sidebar-icon"></i>
                  <span>Performance</span>
                </a>
              </li>
              <li>
                <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
                  <i class="fas fa-cog sidebar-icon"></i>
                  <span>Settings</span>
                </a>
              </li>
            </ul>
          </nav>
          
          <!-- Help Section -->
          <div class="mt-6 pt-6 border-t border-gray-100">
            <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
              <i class="fas fa-question-circle sidebar-icon"></i>
              <span>Help & Support</span>
            </a>
            <a href="#" class="flex items-center space-x-3 text-gray-700 hover:bg-gray-50 px-4 py-3 rounded-md hover:border-l-3 hover:border-blue-900 sidebar-item">
              <i class="fas fa-sign-out-alt sidebar-icon"></i>
              <span>Logout</span>
            </a>
          </div>
        </div>
      </aside>

      <!-- Main Content -->
      <main class="flex-1 overflow-y-auto">
        <!-- Desktop Header -->
        <header class="hidden lg:flex justify-between items-center p-6 bg-white border-b border-gray-200 sticky top-0 z-20">
          <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
          <div class="flex items-center space-x-6">
            <!-- Search Bar -->
            <div class="relative hidden md:block">
              <input type="text" placeholder="Search courses..." class="pl-10 pr-4 py-2 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
              <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            
            <!-- Language Selector -->
            <div class="relative">
              <button class="flex items-center space-x-2 bg-gray-100 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                <span class="font-medium text-gray-700">English</span>
                <i class="fas fa-chevron-down text-xs text-gray-500"></i>
              </button>
              <div class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg hidden dropdown-animation z-40" id="language-dropdown">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded-t-lg">English</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Hausa</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Yoruba</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded-b-lg">Igbo</a>
              </div>
            </div>
            
            <!-- Notification Bell -->
            <div class="relative">
              <button id="notification-button" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition focus:outline-none">
                <i class="fas fa-bell text-gray-600"></i>
                <span class="absolute notification-dot h-2 w-2 bg-red-500 rounded-full"></span>
              </button>
              <div id="notification-panel" class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg hidden dropdown-animation z-40">
                <div class="flex justify-between items-center p-4 border-b border-gray-100">
                  <h3 class="font-semibold text-gray-800">Notifications</h3>
                  <button class="text-blue-600 text-sm hover:underline">Mark all as read</button>
                </div>
                <div class="p-6 flex items-center justify-center text-gray-500">
                  <div class="text-center">
                    <i class="fas fa-bell-slash text-3xl mb-2 text-gray-300"></i>
                    <p>No new notifications</p>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- User Menu -->
            <div class="relative">
              <button id="user-menu-button" class="flex items-center space-x-3 focus:outline-none">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-900 to-blue-700 rounded-full flex items-center justify-center text-white">
                  <span class="font-medium">AM</span>
                </div>
                <span class="font-medium text-gray-700 hidden md:block">Aminu M.</span>
                <i class="fas fa-chevron-down text-xs text-gray-500 hidden md:block"></i>
              </button>
              <div class="absolute right-0 mt-2 w-60 bg-white rounded-lg shadow-lg hidden dropdown-animation z-40" id="user-dropdown">
                <div class="border-b border-gray-100 p-4">
                  <p class="font-medium text-gray-800">Aminu Mohammed</p>
                  <p class="text-sm text-gray-500">student@koyify.com</p>
                </div>
                <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-blue-50">
                  <i class="fas fa-user mr-2 text-gray-500"></i> My Profile
                </a>
                <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-blue-50">
                  <i class="fas fa-cog mr-2 text-gray-500"></i> Account Settings
                </a>
                <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-blue-50">
                  <i class="fas fa-question-circle mr-2 text-gray-500"></i> Help Center  
                </a>
                <a href="#" class="block px-4 py-3 text-red-600 hover:bg-red-50 border-t border-gray-100 rounded-b-lg">
                  <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                </a>
              </div>
            </div>
          </div>
        </header>

        <div class="p-6">
          <!-- Welcome Section -->
          <div class="welcome-gradient rounded-2xl p-8 text-white mb-8 shadow-lg relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -translate-y-1/2 translate-x-1/4"></div>
            <div class="absolute bottom-0 left-0 w-32 h-32 bg-white opacity-5 rounded-full translate-y-1/2 -translate-x-1/4"></div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center relative z-10">
              <div>
                <h2 class="text-3xl font-bold mb-2">Welcome back, Aminu!</h2>
                <p class="mb-6 text-blue-100 max-w-lg">Continue your learning journey. You've completed 37% of your current course this week. Great progress!</p>
                <button class="bg-white text-blue-900 font-semibold px-6 py-3 rounded-lg hover:bg-blue-50 transition shadow-md">Continue Learning</button>
              </div>
              <img src="/api/placeholder/240/180" alt="Learning Illustration" class="hidden md:block h-36 w-48 object-cover mt-6 md:mt-0 rounded-lg shadow-lg">
            </div>
          </div>

          <!-- Progress Overview -->
          <div class="mb-10">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Your Progress</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div class="bg-white p-6 rounded-xl shadow-sm stats-card">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-gray-500 text-sm">Courses Completed</p>
                    <h4 class="text-3xl font-bold text-gray-800 mt-1">3/8</h4>
                    <p class="text-green-600 text-sm mt-2 flex items-center">
                      <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                    </p>
                  </div>
                  <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-500 text-2xl"></i>
                  </div>
                </div>
              </div>
              <div class="bg-white p-6 rounded-xl shadow-sm stats-card">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-gray-500 text-sm">Hours Spent</p>
                    <h4 class="text-3xl font-bold text-gray-800 mt-1">24.5</h4>
                    <p class="text-blue-600 text-sm mt-2 flex items-center">
                      <i class="fas fa-arrow-up mr-1"></i> 8% from last week
                    </p>
                  </div>
                  <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-clock text-blue-500 text-2xl"></i>
                  </div>
                </div>
              </div>
              <div class="bg-white p-6 rounded-xl shadow-sm stats-card">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-gray-500 text-sm">Certificates Earned</p>
                    <h4 class="text-3xl font-bold text-gray-800 mt-1">2</h4>
                    <p class="text-purple-600 text-sm mt-2">Next certificate: 82% complete</p>
                  </div>
                  <div class="w-14 h-14 rounded-full bg-purple-100 flex items-center justify-center">
                    <i class="fas fa-certificate text-purple-500 text-2xl"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- In Progress Courses -->
          <div class="mb-10">
            <div class="flex justify-between items-center mb-6">
              <h3 class="text-xl font-bold text-gray-800">Courses In Progress</h3>
              <a href="#" class="text-blue-600 text-sm font-medium hover:underline flex items-center">
                View All
                <i class="fas fa-chevron-right ml-1 text-xs"></i>
              </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Course Card 1 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden course-card">
                  <div class="relative">
                    <img src="/api/placeholder/400/200" alt="Web Development Course" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-blue-600 text-white text-xs px-3 py-1 rounded-full">In Progress</div>
                  </div>
                  <div class="p-6">
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Web Development Fundamentals</h4>
                    <div class="flex items-center text-sm text-gray-600 mb-4">
                      <img src="/api/placeholder/32/32" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                      <span>John Doe</span>
                    </div>
                    <div class="mb-4">
                      <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">Progress</span>
                        <span class="font-medium">75%</span>
                      </div>
                      <div class="w-full bg-gray-200 rounded-full course-progress">
                        <div class="bg-blue-600 rounded-full course-progress" style="width: 75%"></div>
                      </div>
                    </div>
                    <div class="flex justify-between items-center">
                      <span class="text-gray-600 text-sm">7/12 lessons</span>
                      <button class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition">Continue</button>
                    </div>
                  </div>
                </div>
                
                <!-- Course Card 2 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden course-card">
                  <div class="relative">
                    <img src="/api/placeholder/400/200" alt="Data Science Course" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-blue-600 text-white text-xs px-3 py-1 rounded-full">In Progress</div>
                  </div>
                  <div class="p-6">
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Data Science Basics</h4>
                    <div class="flex items-center text-sm text-gray-600 mb-4">
                      <img src="/api/placeholder/32/32" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                      <span>Sarah Johnson</span>
                    </div>
                    <div class="mb-4">
                      <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">Progress</span>
                        <span class="font-medium">45%</span>
                      </div>
                      <div class="w-full bg-gray-200 rounded-full course-progress">
                        <div class="bg-blue-600 rounded-full course-progress" style="width: 45%"></div>
                      </div>
                    </div>
                    <div class="flex justify-between items-center">
                      <span class="text-gray-600 text-sm">5/15 lessons</span>
                      <button class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition">Continue</button>
                    </div>
                  </div>
                </div>
                
                <!-- Course Card 3 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden course-card">
                  <div class="relative">
                    <img src="/api/placeholder/400/200" alt="Mobile Development Course" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-blue-600 text-white text-xs px-3 py-1 rounded-full">In Progress</div>
                  </div>
                  <div class="p-6">
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Mobile App Development</h4>
                    <div class="flex items-center text-sm text-gray-600 mb-4">
                      <img src="/api/placeholder/32/32" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                      <span>David Wilson</span>
                    </div>
                    <div class="mb-4">
                      <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">Progress</span>
                        <span class="font-medium">25%</span>
                      </div>
                      <div class="w-full bg-gray-200 rounded-full course-progress">
                        <div class="bg-blue-600 rounded-full course-progress" style="width: 25%"></div>
                      </div>
                    </div>
                    <div class="flex justify-between items-center">
                      <span class="text-gray-600 text-sm">3/10 lessons</span>
                      <button class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition">Continue</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <!-- Recommended Courses -->
            <div class="mb-10">
              <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Recommended For You</h3>
                <a href="#" class="text-blue-600 text-sm font-medium hover:underline flex items-center">
                  View All
                  <i class="fas fa-chevron-right ml-1 text-xs"></i>
                </a>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Recommended Course 1 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden course-card">
                  <div class="relative">
                    <img src="/api/placeholder/400/200" alt="AI Course" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-green-600 text-white text-xs px-3 py-1 rounded-full">New</div>
                  </div>
                  <div class="p-6">
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Artificial Intelligence Fundamentals</h4>
                    <div class="flex items-center text-sm text-gray-600 mb-4">
                      <img src="/api/placeholder/32/32" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                      <span>Dr. Alan Smith</span>
                    </div>
                    <div class="flex items-center mb-4">
                      <div class="flex text-yellow-400 mr-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </div>
                      <span class="text-gray-600 text-sm">4.5 (342 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                      <span class="text-blue-600 font-bold">₦15,000</span>
                      <button class="bg-gray-100 text-gray-800 rounded-lg px-4 py-2 hover:bg-gray-200 transition">Add to Cart</button>
                    </div>
                  </div>
                </div>
                
                <!-- Recommended Course 2 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden course-card">
                  <div class="relative">
                    <img src="/api/placeholder/400/200" alt="UX Design Course" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-orange-600 text-white text-xs px-3 py-1 rounded-full">Popular</div>
                  </div>
                  <div class="p-6">
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">UX Design Masterclass</h4>
                    <div class="flex items-center text-sm text-gray-600 mb-4">
                      <img src="/api/placeholder/32/32" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                      <span>Emily Chen</span>
                    </div>
                    <div class="flex items-center mb-4">
                      <div class="flex text-yellow-400 mr-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      <span class="text-gray-600 text-sm">5.0 (512 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                      <span class="text-blue-600 font-bold">₦18,500</span>
                      <button class="bg-gray-100 text-gray-800 rounded-lg px-4 py-2 hover:bg-gray-200 transition">Add to Cart</button>
                    </div>
                  </div>
                </div>
                
                <!-- Recommended Course 3 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden course-card">
                  <div class="relative">
                    <img src="/api/placeholder/400/200" alt="Digital Marketing Course" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-purple-600 text-white text-xs px-3 py-1 rounded-full">Trending</div>
                  </div>
                  <div class="p-6">
                    <h4 class="font-semibold text-lg text-gray-800 mb-2">Digital Marketing Strategy</h4>
                    <div class="flex items-center text-sm text-gray-600 mb-4">
                      <img src="/api/placeholder/32/32" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                      <span>Michael Roberts</span>
                    </div>
                    <div class="flex items-center mb-4">
                      <div class="flex text-yellow-400 mr-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                      </div>
                      <span class="text-gray-600 text-sm">4.0 (278 reviews)</span>
                    </div>
                    <div class="flex justify-between items-center">
                      <span class="text-blue-600 font-bold">₦12,000</span>
                      <button class="bg-gray-100 text-gray-800 rounded-lg px-4 py-2 hover:bg-gray-200 transition">Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <!-- Recent Activity -->
            <div>
              <h3 class="text-xl font-bold text-gray-800 mb-6">Recent Activity</h3>
              <div class="bg-white rounded-xl shadow-sm">
                <div class="p-5 border-b border-gray-100 activity-item">
                  <div class="flex items-start">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4 shrink-0">
                      <i class="fas fa-play-circle text-blue-600"></i>
                    </div>
                    <div>
                      <p class="text-gray-800 font-medium">You completed lesson 5: "CSS Frameworks" in Web Development Fundamentals</p>
                      <p class="text-gray-500 text-sm mt-1">2 hours ago</p>
                    </div>
                  </div>
                </div>
                <div class="p-5 border-b border-gray-100 activity-item">
                  <div class="flex items-start">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-4 shrink-0">
                      <i class="fas fa-trophy text-green-600"></i>
                    </div>
                    <div>
                      <p class="text-gray-800 font-medium">You passed the quiz on Data Science Basics with a score of 85%</p>
                      <p class="text-gray-500 text-sm mt-1">Yesterday</p>
                    </div>
                  </div>
                </div>
                <div class="p-5 border-b border-gray-100 activity-item">
                  <div class="flex items-start">
                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-4 shrink-0">
                      <i class="fas fa-certificate text-purple-600"></i>
                    </div>
                    <div>
                      <p class="text-gray-800 font-medium">You earned a certificate in Python Programming</p>
                      <p class="text-gray-500 text-sm mt-1">3 days ago</p>
                    </div>
                  </div>
                </div>
                <div class="p-5 activity-item">
                  <div class="flex items-start">
                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-4 shrink-0">
                      <i class="fas fa-book text-orange-600"></i>
                    </div>
                    <div>
                      <p class="text-gray-800 font-medium">You enrolled in a new course: Mobile App Development</p>
                      <p class="text-gray-500 text-sm mt-1">5 days ago</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Footer -->
          <footer class="bg-white border-t border-gray-200 mt-8 py-6">
            <div class="container mx-auto px-6">
              <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <svg class="w-8 h-8 mr-2" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 5L30 10V30L20 35L10 30V10L20 5Z" fill="#0A2463" />
                        <path d="M20 5L30 10V20L20 25L10 20V10L20 5Z" fill="#3E92CC" />
                        <path d="M20 15L25 17.5V25L20 27.5L15 25V17.5L20 15Z" fill="#1CA664" />
                      </svg>
                      <span class="text-xl font-bold">
                        <span class="text-blue-900">Koyi</span>
                        <span class="text-green-600">fy</span>
                      </span>
                    </div>
                    <div class="flex space-x-8">
                      <a href="#" class="text-gray-600 hover:text-blue-700">Privacy Policy</a>
                      <a href="#" class="text-gray-600 hover:text-blue-700">Terms of Service</a>
                      <a href="#" class="text-gray-600 hover:text-blue-700">Contact Support</a>
                    </div>
                  </div>
                  <div class="text-center mt-6">
                    <p class="text-gray-500 text-sm">© 2025 Koyify. All rights reserved.</p>
                  </div>
                </div>
              </footer>
            </main>
          </div>
        </div>
      </div>
    
      <!-- JavaScript -->
      <script>
        // Language Dropdown
        const languageButton = document.querySelector('.language-selector');
        const languageDropdown = document.getElementById('language-dropdown');
        
        // Mobile Language Dropdown
        const mobileLanguageDropdown = document.getElementById('language-dropdown-mobile');
        
        // Notification Toggle
        const notificationButton = document.getElementById('notification-button');
        const notificationPanel = document.getElementById('notification-panel');
        
        // Mobile Notification Toggle
        const mobileNotificationButton = document.getElementById('mobile-notification-button');
        const notificationPanelMobile = document.getElementById('notification-panel-mobile');
        
        // User Menu Toggle
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');
        
        // Mobile User Menu Toggle
        const mobileUserMenuButton = document.getElementById('mobile-user-menu-button');
        const userDropdownMobile = document.getElementById('user-dropdown-mobile');
        
        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const closeMobileMenuButton = document.getElementById('close-mobile-menu');
        
        // Function to toggle dropdown visibility
        function toggleDropdown(dropdown) {
          dropdown.classList.toggle('hidden');
        }
        
        // Function to close all dropdowns
        function closeAllDropdowns() {
          const dropdowns = document.querySelectorAll('.dropdown-animation');
          dropdowns.forEach(dropdown => {
            dropdown.classList.add('hidden');
          });
        }
        
        // Toggle language dropdown
        document.addEventListener('click', function(event) {
          if (event.target.closest('.language-selector')) {
            toggleDropdown(languageDropdown);
          } else if (languageDropdown) {
            languageDropdown.classList.add('hidden');
          }
          
          // Mobile language dropdown
          if (event.target.closest('.bg-gray-100.px-3.py-1.rounded-md')) {
            toggleDropdown(mobileLanguageDropdown);
          } else if (mobileLanguageDropdown) {
            mobileLanguageDropdown.classList.add('hidden');
          }
        });
        
        // Toggle notification panel
        if (notificationButton) {
          notificationButton.addEventListener('click', function() {
            toggleDropdown(notificationPanel);
            userDropdown.classList.add('hidden');
          });
        }
        
        // Toggle mobile notification panel
        if (mobileNotificationButton) {
          mobileNotificationButton.addEventListener('click', function() {
            toggleDropdown(notificationPanelMobile);
            userDropdownMobile.classList.add('hidden');
          });
        }
        
        // Toggle user menu
        if (userMenuButton) {
          userMenuButton.addEventListener('click', function() {
            toggleDropdown(userDropdown);
            notificationPanel.classList.add('hidden');
          });
        }
        
        // Toggle mobile user menu
        if (mobileUserMenuButton) {
          mobileUserMenuButton.addEventListener('click', function() {
            toggleDropdown(userDropdownMobile);
            notificationPanelMobile.classList.add('hidden');
          });
        }
        
        // Toggle mobile menu
        if (mobileMenuButton) {
          mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.remove('-translate-x-full');
            mobileMenuOverlay.classList.remove('hidden');
          });
        }
        
        // Close mobile menu
        if (closeMobileMenuButton) {
          closeMobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.add('-translate-x-full');
            mobileMenuOverlay.classList.add('hidden');
          });
        }
        
        // Close mobile menu when clicking outside
        if (mobileMenuOverlay) {
          mobileMenuOverlay.addEventListener('click', function() {
            mobileMenu.classList.add('-translate-x-full');
            mobileMenuOverlay.classList.add('hidden');
          });
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
          if (!event.target.closest('#notification-button') && 
              !event.target.closest('#notification-panel') &&
              !event.target.closest('#user-menu-button') &&
              !event.target.closest('#user-dropdown') &&
              !event.target.closest('#mobile-notification-button') &&
              !event.target.closest('#notification-panel-mobile') &&
              !event.target.closest('#mobile-user-menu-button') &&
              !event.target.closest('#user-dropdown-mobile') &&
              !event.target.closest('.language-selector') &&
              !event.target.closest('#language-dropdown') &&
              !event.target.closest('.bg-gray-100.px-3.py-1.rounded-md') &&
              !event.target.closest('#language-dropdown-mobile')) {
            
            // Close all dropdowns
            if (notificationPanel) notificationPanel.classList.add('hidden');
            if (userDropdown) userDropdown.classList.add('hidden');
            if (notificationPanelMobile) notificationPanelMobile.classList.add('hidden');
            if (userDropdownMobile) userDropdownMobile.classList.add('hidden');
            if (languageDropdown) languageDropdown.classList.add('hidden');
            if (mobileLanguageDropdown) mobileLanguageDropdown.classList.add('hidden');
          }
        });
      </script>
    </body>
    </html>