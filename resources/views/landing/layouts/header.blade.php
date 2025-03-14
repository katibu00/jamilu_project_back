<header class="bg-white shadow-md sticky top-0 z-40">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3">
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

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="/"
                    class="text-blue-900 font-medium hover:text-green-600 transition border-b-2 border-blue-900">Home</a>
                <a href="/courses"
                    class="text-gray-700 font-medium hover:text-green-600 transition hover:border-b-2 hover:border-green-600">Courses</a>
                <a href="/bootcamps"
                    class="text-gray-700 font-medium hover:text-green-600 transition hover:border-b-2 hover:border-green-600">Bootcamps</a>
                <a href="/for-government"
                    class="text-gray-700 font-medium hover:text-green-600 transition hover:border-b-2 hover:border-green-600">Government</a>
                <a href="/for-institutions"
                    class="text-gray-700 font-medium hover:text-green-600 transition hover:border-b-2 hover:border-green-600">Institutions</a>
                <a href="/about"
                    class="text-gray-700 font-medium hover:text-green-600 transition hover:border-b-2 hover:border-green-600">About
                    Us</a>
            </nav>

            <!-- Right Section -->
            <div class="flex items-center space-x-4">
                <!-- Language Switch (visible on all screens) -->
                <div
                    class="language-toggle rounded-md overflow-hidden relative h-9 w-28 border border-gray-200 md:block mobile-language-toggle">
                    <div class="toggle-slider"></div>
                    <div class="flex h-full">
                        <button class="w-1/2 z-10 text-sm font-medium text-white transition">English</button>
                        <button class="w-1/2 z-10 text-sm font-medium text-gray-700 transition">Hausa</button>
                    </div>
                </div>

                <!-- CTA Button (visible on desktop) -->
                <a href="/ai-advisor"
                    class="hidden md:flex items-center btn-primary text-white font-medium px-4 py-2 rounded-md transition">
                    <span>AI Career Advisor</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-700 focus:outline-none z-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path id="mobile-menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation (Full Screen) -->
        <div id="mobile-menu"
            class="fixed inset-0 bg-white z-40 flex flex-col justify-center items-center md:hidden hidden">
            <a href="/" class="py-3 text-xl text-blue-900 font-semibold">Home</a>
            <a href="/courses" class="py-3 text-xl text-gray-700 font-semibold">Courses</a>
            <a href="/bootcamps" class="py-3 text-xl text-gray-700 font-semibold">Bootcamps</a>
            <a href="/for-government" class="py-3 text-xl text-gray-700 font-semibold">Government</a>
            <a href="/for-institutions" class="py-3 text-xl text-gray-700 font-semibold">Institutions</a>
            <a href="/about" class="py-3 text-xl text-gray-700 font-semibold">About Us</a>

            <!-- CTA Button for Mobile -->
            <a href="/ai-advisor"
                class="mt-6 btn-primary text-white font-medium px-6 py-3 rounded-md flex items-center">
                <span>AI Career Advisor</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</header>