<div class="bg-gray-100 text-sm py-2 transition-all duration-300" id="topBar">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex space-x-4">
            <a href="#" class="text-gray-600 hover:text-blue-600 border-b-2 border-blue-600">Individuals</a>
            <a href="#" class="text-gray-600 hover:text-blue-600">Government</a>
            <a href="#" class="text-gray-600 hover:text-blue-600">Universities</a>
        </div>
        <div class="relative">
            <button id="languageToggle" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600">
                <span id="selectedLanguage">English</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="languageDropdown" class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg hidden">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-lang="en">English</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-lang="ha">Hausa</a>
            </div>
        </div>
    </div>
</div>
<header class="bg-white shadow-md sticky top-0 z-50" id="mainHeader">
    <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
        <div class="flex items-center space-x-6">
            <a href="/" class="text-2xl font-bold text-blue-600">Skillify</a>
            <div class="hidden md:flex items-center space-x-6">
                @php
                    $prefix = Request::route()->getPrefix();
                    $route = Route::current()->getName();
                @endphp

                @auth
                    @if(auth()->user()->role == 'instructor')
                        @include('layouts.menu.instructor')
                    @endif
                    @if(auth()->user()->role == 'student')
                        @include('layouts.menu.student')
                    @endif
                    @if(auth()->user()->role == 'admin')
                        @include('layouts.menu.admin')
                    @endif
                @endauth
                @guest
                    @include('layouts.menu.guest')
                @endguest

            </div>
        </div>
        <div class="flex items-center space-x-4">
          
          
            <button id="searchToggle" class="text-gray-700 hover:text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>

            {{-- <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">Sign In</a> --}}

            <div id="notificationMenu" class="relative">
                <button id="notificationToggle" class="text-gray-700 hover:text-blue-600 relative">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">3</span>
                </button>
                <div id="notificationDropdown" class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg hidden overflow-hidden">
                    <div class="p-2 text-sm text-gray-700">
                        <div class="border-b pb-2 mb-2">
                            <p class="font-semibold">New message from John Doe</p>
                            <p class="text-xs text-gray-500">2 hours ago</p>
                        </div>
                        <div class="border-b pb-2 mb-2">
                            <p class="font-semibold">Your course "Web Development 101" has been approved</p>
                            <p class="text-xs text-gray-500">1 day ago</p>
                        </div>
                        <div>
                            <p class="font-semibold">Don't forget to complete your profile!</p>
                            <p class="text-xs text-gray-500">3 days ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="userMenu" class="relative">
                <button id="userMenuToggle" class="flex items-center space-x-2 p-2 rounded-full hover:bg-gray-100">
                    <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-8 h-8 rounded-full">
                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                </div>
            </div>

            <button id="mobileMenuToggle" class="md:hidden text-gray-700 hover:text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </nav>
    <div id="mobileMenu" class="md:hidden hidden bg-white border-t">
        <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-100">HHH</a>
        <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-100">Universities</a>
        <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-100">For Government</a>
    </div>
    <div id="searchBar" class="bg-gray-100 py-4 hidden">
        <div class="container mx-auto px-4">
            <input type="text" placeholder="Search courses..." class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>
    </div>
</header>