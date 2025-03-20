<footer class="bg-blue-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- About Section -->
            <div class="md:col-span-1">
                <div class="flex items-center mb-6">
                    <svg class="w-8 h-8 mr-2" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 5L30 10V30L20 35L10 30V10L20 5Z" fill="#FFFFFF"/>
                        <path d="M20 5L30 10V20L20 25L10 20V10L20 5Z" fill="#3E92CC"/>
                        <path d="M20 15L25 17.5V25L20 27.5L15 25V17.5L20 15Z" fill="#1CA664"/>
                    </svg>
                    <span class="text-2xl font-extrabold tracking-tight">
                        <span class="text-white">Koyi</span>
                        <span class="text-green-400">fy</span>
                    </span>
                </div>
                <p class="text-blue-200 mb-6">
                    Northern Nigeria's first Hausa-first ICT education platform, making technology accessible to everyone.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-blue-200 hover:text-white transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-blue-200 hover:text-white transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-blue-200 hover:text-white transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-blue-200 hover:text-white transition">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-6">Quick Links</h3>
                <ul class="space-y-4">
                    <li><a href="/courses" class="text-blue-200 hover:text-white transition">Courses</a></li>
                    <li><a href="/bootcamps" class="text-blue-200 hover:text-white transition">Bootcamps</a></li>
                    <li><a href="/ai-advisor" class="text-blue-200 hover:text-white transition">AI Career Advisor</a></li>
                    <li><a href="/about" class="text-blue-200 hover:text-white transition">About Us</a></li>
                    <li><a href="/contact" class="text-blue-200 hover:text-white transition">Contact</a></li>
                </ul>
            </div>
            
            <!-- For Organizations -->
            <div>
                <h3 class="text-xl font-bold mb-6">For Organizations</h3>
                <ul class="space-y-4">
                    <li><a href="/for-government" class="text-blue-200 hover:text-white transition">Government</a></li>
                    <li><a href="/for-institutions" class="text-blue-200 hover:text-white transition">Institutions</a></li>
                    <li><a href="/scholarships" class="text-blue-200 hover:text-white transition">Scholarships</a></li>
                    <li><a href="/partner" class="text-blue-200 hover:text-white transition">Become a Partner</a></li>
                    <li><a href="{{ route('careers.index') }}" class="text-blue-200 hover:text-white transition">Careers</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h3 class="text-xl font-bold mb-6">Contact Us</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3 text-green-400"></i>
                        <span class="text-blue-200">Kano, Nigeria</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-envelope mt-1 mr-3 text-green-400"></i>
                        <span class="text-blue-200">info@koyify.com</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-phone-alt mt-1 mr-3 text-green-400"></i>
                        <span class="text-blue-200">+234 800 000 0000</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-blue-800 pt-8 text-center text-blue-300 text-sm">
            <p>&copy; 2025 Koyify. All rights reserved.</p>
        </div>
    </div>
</footer>