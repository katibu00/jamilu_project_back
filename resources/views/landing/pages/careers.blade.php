@extends('landing.layouts.app')

@section('content')
<!-- Career Paths Hero Section -->
<section class="hero-gradient text-white py-16 md:py-24 relative">
    <div class="container mx-auto px-4 md:px-8 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-3xl md:text-5xl font-bold mb-4" data-aos="fade-up">Explore Tech Career Paths</h1>
            <p class="text-lg md:text-xl opacity-90 mb-8" data-aos="fade-up" data-aos-delay="100">
                Discover structured roadmaps to launch your tech career in Nigeria. Select a path that matches your interests and goals.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="200">
                <button class="btn-primary px-8 py-3 rounded-full font-semibold text-white">
                    Take Career Assessment
                </button>
                <button class="btn-secondary text-black px-8 py-3 rounded-full font-semibold text-primary-blue border border-white">
                    Join Community
                </button>
            </div>
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="wave-divider">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
</section>

<!-- Career Categories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 md:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-4xl font-bold career-path-heading text-center inline-block" data-aos="fade-up">
                Find Your Path
            </h2>
            <p class="text-gray-600 mt-6 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                We've organized these career paths specifically for beginners in Northern Nigeria. 
                Each path includes step-by-step guidance to help you succeed.
            </p>
        </div>
        
        <!-- Filter Tabs -->
        <div class="flex flex-wrap justify-center gap-2 mb-10" data-aos="fade-up" data-aos-delay="150">
            <button class="px-5 py-2 rounded-full bg-primary-blue text-white font-medium">
                All Paths
            </button>
            <button class="px-5 py-2 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition">
                No-Code
            </button>
            <button class="px-5 py-2 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition">
                Programming
            </button>
            <button class="px-5 py-2 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition">
                Data
            </button>
            <button class="px-5 py-2 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition">
                Design
            </button>
        </div>
        
        <!-- Career Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Web Development Card -->
            <a href="{{ route('careers.web-development') }}" class="block">
                <div class="career-card bg-white rounded-xl overflow-hidden h-full" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-700 opacity-90"></div>
                        <div class="absolute inset-0 dot-pattern"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-code text-6xl text-white opacity-90"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full p-5 text-white">
                            <h3 class="font-bold text-xl">Web Development</h3>
                            <p class="opacity-90">Frontend & Backend</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs font-medium bg-blue-100 text-blue-600 px-3 py-1 rounded-full">HTML/CSS</span>
                            <span class="text-xs font-medium bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full">JavaScript</span>
                            <span class="text-xs font-medium bg-purple-100 text-purple-600 px-3 py-1 rounded-full">PHP</span>
                        </div>
                        <p class="text-gray-600 mb-4">Learn to build responsive websites and web applications from scratch.</p>
                        <div class="flex flex-wrap justify-between text-sm border-t pt-4">
                            <div class="career-stat">
                                <span class="career-stat-value">₦150k+</span>
                                <span class="career-stat-label">Starting Salary</span>
                            </div>
                            <div class="career-stat">
                                <span class="career-stat-value">3-6</span>
                                <span class="career-stat-label">Months Training</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            
            <!-- Data Analysis Card -->
            <a href="/careers/data-analysis" class="block">
                <div class="career-card bg-white rounded-xl overflow-hidden h-full" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500 to-green-700 opacity-90"></div>
                        <div class="absolute inset-0 dot-pattern"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-chart-pie text-6xl text-white opacity-90"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full p-5 text-white">
                            <h3 class="font-bold text-xl">Data Analysis</h3>
                            <p class="opacity-90">Excel & Visualization</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs font-medium bg-green-100 text-green-600 px-3 py-1 rounded-full">Excel</span>
                            <span class="text-xs font-medium bg-blue-100 text-blue-600 px-3 py-1 rounded-full">Power BI</span>
                            <span class="text-xs font-medium bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full">SQL Basics</span>
                        </div>
                        <p class="text-gray-600 mb-4">Transform raw data into insights using Excel and visualization tools.</p>
                        <div class="flex flex-wrap justify-between text-sm border-t pt-4">
                            <div class="career-stat">
                                <span class="career-stat-value">₦120k+</span>
                                <span class="career-stat-label">Starting Salary</span>
                            </div>
                            <div class="career-stat">
                                <span class="career-stat-value">2-4</span>
                                <span class="career-stat-label">Months Training</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            
            <!-- UI/UX Design Card -->
            <a href="/careers/ui-ux-design" class="block">
                <div class="career-card bg-white rounded-xl overflow-hidden h-full" data-aos="fade-up" data-aos-delay="400">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-purple-700 opacity-90"></div>
                        <div class="absolute inset-0 dot-pattern"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-paint-brush text-6xl text-white opacity-90"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full p-5 text-white">
                            <h3 class="font-bold text-xl">UI/UX Design</h3>
                            <p class="opacity-90">User Interface & Experience</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs font-medium bg-purple-100 text-purple-600 px-3 py-1 rounded-full">Figma</span>
                            <span class="text-xs font-medium bg-blue-100 text-blue-600 px-3 py-1 rounded-full">Wireframing</span>
                            <span class="text-xs font-medium bg-pink-100 text-pink-600 px-3 py-1 rounded-full">Prototyping</span>
                        </div>
                        <p class="text-gray-600 mb-4">Design beautiful, functional interfaces that users love to interact with.</p>
                        <div class="flex flex-wrap justify-between text-sm border-t pt-4">
                            <div class="career-stat">
                                <span class="career-stat-value">₦140k+</span>
                                <span class="career-stat-label">Starting Salary</span>
                            </div>
                            <div class="career-stat">
                                <span class="career-stat-value">3-5</span>
                                <span class="career-stat-label">Months Training</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            
            <!-- Digital Marketing Card -->
            <a href="/careers/digital-marketing" class="block">
                <div class="career-card bg-white rounded-xl overflow-hidden h-full" data-aos="fade-up" data-aos-delay="500">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-red-700 opacity-90"></div>
                        <div class="absolute inset-0 dot-pattern"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-bullhorn text-6xl text-white opacity-90"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full p-5 text-white">
                            <h3 class="font-bold text-xl">Digital Marketing</h3>
                            <p class="opacity-90">Social Media & SEO</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs font-medium bg-red-100 text-red-600 px-3 py-1 rounded-full">Social Media</span>
                            <span class="text-xs font-medium bg-green-100 text-green-600 px-3 py-1 rounded-full">SEO</span>
                            <span class="text-xs font-medium bg-blue-100 text-blue-600 px-3 py-1 rounded-full">Content</span>
                        </div>
                        <p class="text-gray-600 mb-4">Learn to market products and services online using proven strategies.</p>
                        <div class="flex flex-wrap justify-between text-sm border-t pt-4">
                            <div class="career-stat">
                                <span class="career-stat-value">₦100k+</span>
                                <span class="career-stat-label">Starting Salary</span>
                            </div>
                            <div class="career-stat">
                                <span class="career-stat-value">2-3</span>
                                <span class="career-stat-label">Months Training</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            
            <!-- Mobile App Development Card -->
            <a href="/careers/mobile-development" class="block">
                <div class="career-card bg-white rounded-xl overflow-hidden h-full" data-aos="fade-up" data-aos-delay="600">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-indigo-700 opacity-90"></div>
                        <div class="absolute inset-0 dot-pattern"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-mobile-alt text-6xl text-white opacity-90"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full p-5 text-white">
                            <h3 class="font-bold text-xl">Mobile Development</h3>
                            <p class="opacity-90">Android & iOS</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs font-medium bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full">Flutter</span>
                            <span class="text-xs font-medium bg-green-100 text-green-600 px-3 py-1 rounded-full">React Native</span>
                            <span class="text-xs font-medium bg-blue-100 text-blue-600 px-3 py-1 rounded-full">Apps</span>
                        </div>
                        <p class="text-gray-600 mb-4">Create mobile applications for Android and iOS devices.</p>
                        <div class="flex flex-wrap justify-between text-sm border-t pt-4">
                            <div class="career-stat">
                                <span class="career-stat-value">₦180k+</span>
                                <span class="career-stat-label">Starting Salary</span>
                            </div>
                            <div class="career-stat">
                                <span class="career-stat-value">4-8</span>
                                <span class="career-stat-label">Months Training</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            
            <!-- Cybersecurity Card -->
            <a href="/careers/cybersecurity" class="block">
                <div class="career-card bg-white rounded-xl overflow-hidden h-full" data-aos="fade-up" data-aos-delay="700">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-gray-700 to-gray-900 opacity-90"></div>
                        <div class="absolute inset-0 dot-pattern"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-shield-alt text-6xl text-white opacity-90"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full p-5 text-white">
                            <h3 class="font-bold text-xl">Cybersecurity</h3>
                            <p class="opacity-90">Network & System Security</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">Network Security</span>
                            <span class="text-xs font-medium bg-red-100 text-red-600 px-3 py-1 rounded-full">Ethical Hacking</span>
                            <span class="text-xs font-medium bg-blue-100 text-blue-600 px-3 py-1 rounded-full">Security Tools</span>
                        </div>
                        <p class="text-gray-600 mb-4">Protect systems and networks from digital attacks and security breaches.</p>
                        <div class="flex flex-wrap justify-between text-sm border-t pt-4">
                            <div class="career-stat">
                                <span class="career-stat-value">₦200k+</span>
                                <span class="career-stat-label">Starting Salary</span>
                            </div>
                            <div class="career-stat">
                                <span class="career-stat-value">4-8</span>
                                <span class="career-stat-label">Months Training</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- View More Button -->
        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="800">
            <button class="btn-primary px-8 py-3 rounded-full font-semibold text-white inline-flex items-center">
                View All Career Paths
                <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </div>
</section>

<!-- Career Guidance CTA Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 md:px-8">
        <div class="bg-white rounded-2xl overflow-hidden shadow-xl custom-shadow">
            <div class="grid md:grid-cols-2 gap-0">
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <h2 class="text-2xl md:text-3xl font-bold mb-4 career-path-heading inline-block" data-aos="fade-up">
                        Not Sure Which Path To Choose?
                    </h2>
                    <p class="text-gray-600 mb-6" data-aos="fade-up" data-aos-delay="100">
                        Take our personalized assessment to discover which tech career best matches your skills, 
                        interests, and goals. Get a tailored learning plan just for you.
                    </p>
                    <div class="flex flex-wrap gap-4" data-aos="fade-up" data-aos-delay="200">
                        <button class="btn-primary px-6 py-3 rounded-full font-semibold text-white">
                            Start Career Assessment
                        </button>
                        <button class="border border-primary-blue text-primary-blue font-semibold px-6 py-3 rounded-full hover:bg-blue-50 transition">
                            Talk to a Career Advisor
                        </button>
                    </div>
                </div>
                <div class="relative h-64 md:h-auto overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" 
                         class="absolute inset-0 w-full h-full object-cover" alt="Career guidance">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary-blue to-transparent opacity-70"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="glassmorphism rounded-full p-4 cursor-pointer hover:scale-110 transition duration-300">
                            <i class="fas fa-play text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 md:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-4xl font-bold career-path-heading inline-block" data-aos="fade-up">
                Success Stories
            </h2>
            <p class="text-gray-600 mt-6 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Meet people from Northern Nigeria who have transformed their careers through Koyify's programs.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Success Story 1 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg custom-shadow" data-aos="fade-up" data-aos-delay="200">
                <div class="relative h-48">
                    <img src="https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" 
                         class="w-full h-full object-cover" alt="Success story">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-4 text-white">
                        <h3 class="font-bold">Ibrahim Musa</h3>
                        <p class="text-sm">Web Developer at TechNigeria</p>
                    </div>
                </div>
                <div class="p-5">
                    <p class="text-gray-600 italic mb-4">
                        "Before Koyify, I had no technical skills. Now I'm a full-stack developer earning 3x my previous salary."
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex">
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                        </div>
                        <span class="text-primary-blue text-sm font-medium">Web Development</span>
                    </div>
                </div>
            </div>
            
            <!-- Success Story 2 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg custom-shadow" data-aos="fade-up" data-aos-delay="300">
                <div class="relative h-48">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" 
                         class="w-full h-full object-cover" alt="Success story">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-4 text-white">
                        <h3 class="font-bold">Fatima Ahmed</h3>
                        <p class="text-sm">Data Analyst at FinBank</p>
                    </div>
                </div>
                <div class="p-5">
                    <p class="text-gray-600 italic mb-4">
                        "Koyify's Excel and data analysis course opened doors to a career I never thought possible."
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex">
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star-half-alt"></i></span>
                        </div>
                        <span class="text-green-600 text-sm font-medium">Data Analysis</span>
                    </div>
                </div>
            </div>
            
            <!-- Success Story 3 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg custom-shadow" data-aos="fade-up" data-aos-delay="400">
                <div class="relative h-48">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" 
                         class="w-full h-full object-cover" alt="Success story">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-4 text-white">
                        <h3 class="font-bold">Aminu Yusuf</h3>
                        <p class="text-sm">UI Designer at CreativeHub</p>
                    </div>
                </div>
                <div class="p-5">
                    <p class="text-gray-600 italic mb-4">
                        "I learned UI/UX design in just 4 months and now work remotely with international clients."
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex">
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                        </div>
                        <span class="text-purple-600 text-sm font-medium">UI/UX Design</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- View More Button -->
        <div class="text-center mt-10" data-aos="fade-up" data-aos-delay="500">
            <a href="/success-stories" class="inline-flex items-center text-primary-blue font-semibold hover:underline">
                Read More Success Stories
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Language Support Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 md:px-8 text-center">
        <div class="inline-block bg-primary-blue bg-opacity-10 px-4 py-2 rounded-full text-primary-blue font-semibold mb-4" data-aos="fade-up">
            Accessible Tech Education
        </div>
        <h2 class="text-2xl md:text-3xl font-bold mb-8" data-aos="fade-up" data-aos-delay="100">
            Available in <span class="highlighted-text">English & Hausa</span>
        </h2>
        <div class="max-w-xl mx-auto bg-white rounded-xl p-4 md:p-6 shadow-lg" data-aos="fade-up" data-aos-delay="200">
            <div class="language-toggle relative bg-gray-100 rounded-lg p-1 flex mb-6">
                <div class="toggle-slider"></div>
                <button class="flex-1 py-2 px-4 text-center relative z-10 font-medium">English</button>
                <button class="flex-1 py-2 px-4 text-center relative z-10 font-medium">Hausa</button>
            </div>
            <div class="text-left mb-4">
                <p class="text-gray-700 mb-4">
                    <span class="font-semibold">First tech education platform available in Hausa language.</span> 
                    We believe everyone deserves access to quality tech education in their preferred language.
                </p>
                <p class="text-gray-700">
                    Switch between English and Hausa at any time while learning to make your experience comfortable and effective.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection