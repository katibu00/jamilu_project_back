<header class="bg-white shadow-md sticky top-0 z-40">
    <!-- Mobile-only top utility bar -->
    <div class="bg-gray-50 border-b border-gray-200 block md:hidden">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-2 text-sm">
                <!-- Login/Register links -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="text-blue-900 hover:text-green-600 font-medium transition">Login</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('register') }}" class="text-blue-900 hover:text-green-600 font-medium transition">Register</a>
                </div>
                
                <!-- AI Career Advisor link for mobile -->
                <a href="/ai-advisor" class="flex items-center bg-green-600 hover:bg-green-700 text-white font-medium px-3 py-1.5 rounded-md transition text-sm">
                    <span>AI Advisor</span>
                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Main navigation bar -->
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
            <nav class="hidden md:flex space-x-6">
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
                    class="text-gray-700 font-medium hover:text-green-600 transition hover:border-b-2 hover:border-green-600">About Us</a>
            </nav>

            <!-- Right Section - Desktop -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Language Dropdown -->
                <div class="relative inline-block text-left">
                    <button id="language-menu-button" class="flex items-center text-gray-700 hover:text-green-600 transition text-sm">
                        <span>English</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="language-dropdown" class="hidden absolute right-0 mt-2 w-24 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1" role="menu">
                            <a href="#" class="block px-4 py-2 text-sm text-blue-900 hover:bg-gray-100" role="menuitem">English</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Hausa</a>
                        </div>
                    </div>
                </div>
                
                <!-- Login/Register Buttons (Desktop only) -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600 font-medium transition text-sm">Login</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-green-600 font-medium transition text-sm">Register</a>
                </div>
                
                <!-- AI Career Advisor Button -->
                <a href="/ai-advisor"
                    class="flex items-center bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2 rounded-md transition">
                    <span>AI Career Advisor</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            
            <!-- Right Section - Mobile -->
            <div class="flex md:hidden items-center space-x-3">
                <!-- Language Dropdown - Mobile -->
                <div class="relative inline-block text-left">
                    <button id="mobile-language-button" class="flex items-center text-gray-700 hover:text-green-600 transition text-sm">
                        <span>EN</span>
                        <svg class="w-4 h-4 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="mobile-language-dropdown" class="hidden absolute right-0 mt-2 w-24 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1" role="menu">
                            <a href="#" class="block px-4 py-2 text-sm text-blue-900 hover:bg-gray-100" role="menuitem">English</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Hausa</a>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="text-gray-700 focus:outline-none z-50">
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
        </div>
    </div>
</header>

<!-- JavaScript for toggles -->
<script>
   
    
    // Desktop language dropdown toggle
    const languageMenuButton = document.getElementById('language-menu-button');
    const languageDropdown = document.getElementById('language-dropdown');
    
    if (languageMenuButton && languageDropdown) {
        languageMenuButton.addEventListener('click', () => {
            languageDropdown.classList.toggle('hidden');
        });
        
        // Close dropdown when clicking elsewhere
        document.addEventListener('click', (event) => {
            if (!languageMenuButton.contains(event.target) && !languageDropdown.contains(event.target)) {
                languageDropdown.classList.add('hidden');
            }
        });
    }
    
    // Mobile language dropdown toggle
    const mobileLangButton = document.getElementById('mobile-language-button');
    const mobileLangDropdown = document.getElementById('mobile-language-dropdown');
    
    if (mobileLangButton && mobileLangDropdown) {
        mobileLangButton.addEventListener('click', () => {
            mobileLangDropdown.classList.toggle('hidden');
        });
        
        // Close dropdown when clicking elsewhere
        document.addEventListener('click', (event) => {
            if (!mobileLangButton.contains(event.target) && !mobileLangDropdown.contains(event.target)) {
                mobileLangDropdown.classList.add('hidden');
            }
        });
    }
</script>