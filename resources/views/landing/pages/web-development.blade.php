@extends('landing.layouts.app')

@section('content')
<!-- Career Hero Section -->
<section class="hero-gradient text-white py-16 md:py-24 relative">
    <div class="container mx-auto px-4 md:px-8 relative z-10">
        <div class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-7/12 mb-8 md:mb-0" data-aos="fade-right">
                <div class="inline-block bg-white bg-opacity-20 px-4 py-1 rounded-full text-sm font-medium mb-4">
                    Career Path
                </div>
                <h1 class="text-3xl md:text-5xl font-bold mb-4">Web Development</h1>
                <p class="text-lg md:text-xl opacity-90 mb-6">
                    Build websites and web applications that millions of people can use. Learn the fundamentals of frontend and backend development.
                </p>
                <div class="flex flex-wrap gap-3 mb-8">
                    <div class="bg-white bg-opacity-20 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-money-bill-wave mr-2"></i>
                        <span>Starting Salary: <strong>₦150k-200k/month</strong></span>
                    </div>
                    <div class="bg-white bg-opacity-20 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-clock mr-2"></i>
                        <span>Duration: <strong>3-6 months</strong></span>
                    </div>
                    <div class="bg-white bg-opacity-20 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-chart-line mr-2"></i>
                        <span>Demand: <strong>Very High</strong></span>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="200">
                    <button class="btn-primary px-8 py-3 rounded-full font-semibold text-white">
                        Start Learning Now
                    </button>
                    <button class="btn-secondary text-black px-8 py-3 rounded-full font-semibold text-primary-blue border border-white flex items-center">
                        <i class="fas fa-play-circle mr-2"></i> Watch Intro Video
                    </button>
                </div>
            </div>
            <div class="w-full md:w-5/12 md:pl-12" data-aos="fade-left">
                <div class="bg-white bg-opacity-10 rounded-2xl p-6 backdrop-filter backdrop-blur-sm">
                    <h3 class="text-xl font-semibold mb-4">Skills You'll Learn</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center mr-3">
                                <i class="fab fa-html5 text-white"></i>
                            </div>
                            <span>HTML/CSS</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center mr-3">
                                <i class="fab fa-js text-white"></i>
                            </div>
                            <span>JavaScript</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center mr-3">
                                <i class="fab fa-react text-white"></i>
                            </div>
                            <span>React.js</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-purple-600 flex items-center justify-center mr-3">
                                <i class="fab fa-php text-white"></i>
                            </div>
                            <span>PHP</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-700 flex items-center justify-center mr-3">
                                <i class="fas fa-database text-white"></i>
                            </div>
                            <span>MySQL</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center mr-3">
                                <i class="fab fa-node-js text-white"></i>
                            </div>
                            <span>Node.js</span>
                        </div>
                    </div>
                </div>
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

<!-- Career Overview Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 md:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 career-path-heading" data-aos="fade-up">
                    Career Overview
                </h2>
                <div class="mb-8" data-aos="fade-up" data-aos-delay="100">
                    <p class="text-gray-700 mb-4">
                        Web developers build and maintain websites and web applications. As a web developer in Nigeria, you'll have the opportunity to work with businesses, startups, government agencies, or as a freelancer serving clients globally.
                    </p>
                    <p class="text-gray-700 mb-4">
                        Web development is divided into three main specializations:
                    </p>
                    <ul class="list-disc pl-6 text-gray-700 mb-4 space-y-2">
                        <li><strong>Frontend Development:</strong> Creating the visual parts of websites that users interact with using HTML, CSS, and JavaScript.</li>
                        <li><strong>Backend Development:</strong> Building the server-side logic that powers websites using languages like PHP, Python, or JavaScript (Node.js).</li>
                        <li><strong>Full-Stack Development:</strong> Combining both frontend and backend skills to build complete web applications.</li>
                    </ul>
                    <p class="text-gray-700">
                        At Koyify, we focus on practical, job-ready skills that will help you get hired quickly. Our web development path starts with frontend fundamentals before introducing backend concepts, allowing you to start building projects right away.
                    </p>
                </div>
                
                <h3 class="text-xl font-bold mb-4" data-aos="fade-up" data-aos-delay="150">Why Choose Web Development?</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-blue-50 p-5 rounded-lg">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mr-3">
                                <i class="fas fa-globe"></i>
                            </div>
                            <h4 class="font-semibold">High Demand</h4>
                        </div>
                        <p class="text-gray-600">Every business needs a website, creating constant demand for skilled web developers across Nigeria and globally.</p>
                    </div>
                    
                    <div class="bg-green-50 p-5 rounded-lg">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <h4 class="font-semibold">Good Pay</h4>
                        </div>
                        <p class="text-gray-600">Entry-level web developers in Nigeria earn competitive salaries, with experienced developers commanding ₦300k+ monthly.</p>
                    </div>
                    
                    <div class="bg-purple-50 p-5 rounded-lg">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center mr-3">
                                <i class="fas fa-laptop-house"></i>
                            </div>
                            <h4 class="font-semibold">Remote Work</h4>
                        </div>
                        <p class="text-gray-600">Web development skills allow you to work remotely for companies anywhere in the world, not just in your local area.</p>
                    </div>
                    
                    <div class="bg-yellow-50 p-5 rounded-lg">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center mr-3">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h4 class="font-semibold">Low Entry Barrier</h4>
                        </div>
                        <p class="text-gray-600">You don't need an expensive degree - just a computer, internet connection, and dedication to learn.</p>
                    </div>
                </div>
            </div>
            
            <div class="lg:col-span-1" data-aos="fade-left">
                <div class="bg-gray-50 rounded-xl p-6 sticky top-24">
                    <h3 class="text-xl font-bold mb-4">Quick Facts</h3>
                    
                    <div class="mb-6">
                        <h4 class="text-sm text-gray-500 mb-1">Average Salary Range</h4>
                        <div class="flex items-center justify-between">
                            <p class="font-semibold">₦150,000 - ₦400,000</p>
                            <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">Monthly</span>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="text-sm text-gray-500 mb-1">Learning Duration</h4>
                        <div class="flex items-center justify-between">
                            <p class="font-semibold">3-6 months</p>
                            <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded">Full-time</span>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="text-sm text-gray-500 mb-1">Job Opportunities</h4>
                        <ul class="text-gray-700 space-y-2">
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Tech Companies</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Digital Agencies</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Startups</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Banks & Financial Institutions</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Freelancing</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Remote International Jobs</li>
                        </ul>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="text-sm text-gray-500 mb-1">Prerequisites</h4>
                        <ul class="text-gray-700 space-y-2">
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Basic Computer Skills</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Internet Access</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Motivation to Learn</li>
                        </ul>
                    </div>
                    
                    <button class="w-full btn-primary py-3 rounded-lg font-semibold text-white flex items-center justify-center">
                        <i class="fas fa-user-plus mr-2"></i> Enroll Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Career Roadmap Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 md:px-8">
        <h2 class="text-2xl md:text-3xl font-bold mb-2 text-center" data-aos="fade-up">
            Web Development Roadmap
        </h2>
        <p class="text-gray-600 max-w-3xl mx-auto text-center mb-12" data-aos="fade-up" data-aos-delay="100">
            Your step-by-step guide to becoming a professional web developer in Nigeria. We've designed this roadmap to help you learn efficiently and build job-ready skills.
        </p>
        
        <!-- Phase 1: Foundation -->
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-6" data-aos="fade-right">
                <div class="w-12 h-12 rounded-full bg-blue-500 text-white flex items-center justify-center text-xl font-bold">1</div>
                <h3 class="text-2xl font-bold">Foundation (Weeks 1-4)</h3>
            </div>
            
            <div class="pl-6 border-l-4 border-blue-100 ml-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-12 h-12 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                            <i class="fab fa-html5 text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">HTML Fundamentals</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Document structure & semantic elements</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Forms & input elements</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Tables & lists</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Images & multimedia</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: Personal profile page</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                            <i class="fab fa-css3-alt text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">CSS Styling</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Selectors & properties</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Box model & layout</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Colors, typography & backgrounds</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Flexbox & CSS Grid</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: Styled business website</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-12 h-12 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                            <i class="fas fa-mobile-alt text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">Responsive Design</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Media queries</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Mobile-first approach</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Viewport settings</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Responsive images & typography</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: Mobile-friendly landing page</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-blue-50 p-6 rounded-xl mt-6" data-aos="fade-up" data-aos-delay="400">
                    <h4 class="font-bold flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-2"></i> Milestone Project:
                    </h4>
                    <p class="text-gray-700">Create a fully responsive multi-page website for a fictional business with proper HTML structure and CSS styling.</p>
                </div>
            </div>
        </div>
        
        <!-- Phase 2: Interactive Websites -->
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-6" data-aos="fade-right">
                <div class="w-12 h-12 rounded-full bg-yellow-500 text-white flex items-center justify-center text-xl font-bold">2</div>
                <h3 class="text-2xl font-bold">Interactive Websites (Weeks 5-8)</h3>
            </div>
            
            <div class="pl-6 border-l-4 border-yellow-100 ml-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-12 h-12 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center mb-4">
                            <i class="fab fa-js text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">JavaScript Basics</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>Variables, data types & operators</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>Functions & control flow</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>Arrays & objects</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>Error handling</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: JavaScript calculator</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center mb-4">
                            <i class="fas fa-code text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">DOM Manipulation</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>Selecting & modifying elements</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>Event listeners & handlers</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>Creating & removing elements</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>Form validation</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: Interactive form</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-12 h-12 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center mb-4">
                            <i class="fas fa-server text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">Working with APIs</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>AJAX & fetch API</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>JSON data handling</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>Promises & async/await</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-yellow-500"></i>
                                <span>Error handling</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: Weather app using APIs</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-yellow-50 p-6 rounded-xl mt-6" data-aos="fade-up" data-aos-delay="400">
                    <h4 class="font-bold flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-2"></i> Milestone Project:
                    </h4>
                    <p class="text-gray-700">Build an interactive e-commerce product page with filtering, cart functionality, and form validation using HTML, CSS, and JavaScript.</p>
                </div>
            </div>
        </div>
        
        <!-- Phase 3: Frontend Frameworks -->
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-6" data-aos="fade-right">
                <div class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center text-xl font-bold">3</div>
                <h3 class="text-2xl font-bold">Frontend Frameworks (Weeks 9-10)</h3>
            </div>
            
            <div class="pl-6 border-l-4 border-blue-100 ml-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-12 h-12 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                            <i class="fab fa-react text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">Introduction to React</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>JSX syntax</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Components & props</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>State & lifecycle</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Event handling</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: Todo app with React</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                            <i class="fas fa-th-large text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">React Hooks & Routing</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>useState & useEffect</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Custom hooks</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>React Router</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Context API</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: Multi-page React app</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-12 h-12 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                            <i class="fas fa-palette text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">CSS Frameworks</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Bootstrap basics</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Tailwind CSS</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Styled components</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-blue-500"></i>
                                <span>Theme customization</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: Styled React components</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-blue-50 p-6 rounded-xl mt-6" data-aos="fade-up" data-aos-delay="400">
                    <h4 class="font-bold flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-2"></i> Milestone Project:
                    </h4>
                    <p class="text-gray-700">Build a complete React application with multiple pages, data fetching, and user authentication using React Router and Context API.</p>
                </div>
            </div>
        </div>
        
        <!-- Phase 4: Backend Development -->
        <div>
            <div class="flex items-center gap-4 mb-6" data-aos="fade-right">
                <div class="w-12 h-12 rounded-full bg-purple-600 text-white flex items-center justify-center text-xl font-bold">4</div>
                <h3 class="text-2xl font-bold">Backend Development (Weeks 11-14)</h3>
            </div>
            
            <div class="pl-6 border-l-4 border-purple-100 ml-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-12 h-12 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mb-4">
                            <i class="fab fa-php text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">PHP Basics</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>Syntax & variables</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>Control structures</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>Functions & arrays</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>Form handling</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: Contact form with PHP</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mb-4">
                            <i class="fas fa-database text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">MySQL & Databases</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>Database design</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>SQL queries</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>PHP & MySQL integration</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>CRUD operations</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: User management system</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-12 h-12 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mb-4">
                            <i class="fas fa-shield-alt text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-3">Security & Deployment</h4>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>User authentication</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>Input sanitization</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>Database security</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-purple-500"></i>
                                <span>Hosting & deployment</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-code text-xs mt-1.5 mr-2 text-green-500"></i>
                                <span>Project: Secure login system</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-purple-50 p-6 rounded-xl mt-6" data-aos="fade-up" data-aos-delay="400">
                    <h4 class="font-bold flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-2"></i> Final Project:
                    </h4>
                    <p class="text-gray-700">Build a complete full-stack e-commerce website with user authentication, product catalog, shopping cart, and admin panel.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Career Prospects Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-2xl md:text-3xl font-bold mb-6">Career Prospects</h2>
                <p class="text-gray-700 mb-6">
                    After completing our Web Development pathway, you'll be equipped with the skills needed to pursue various career opportunities in the tech industry:
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-code"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Frontend Developer</h3>
                            <p class="text-gray-600">Specialize in creating user interfaces and interactive web experiences.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-server"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Backend Developer</h3>
                            <p class="text-gray-600">Focus on server-side logic, databases, and application architecture.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Full-Stack Developer</h3>
                            <p class="text-gray-600">Work on both frontend and backend aspects of web development.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Freelance Web Developer</h3>
                            <p class="text-gray-600">Build websites for clients on your own schedule and terms.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-xl" data-aos="fade-left">
                <h3 class="text-xl font-bold mb-6">Salary Progression</h3>
                
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-medium">Entry Level</span>
                            <span class="font-semibold text-primary-blue">₦150,000 - ₦200,000</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-primary-blue h-2.5 rounded-full" style="width: 25%"></div>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">0-1 years experience</p>
                    </div>
                    
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-medium">Mid Level</span>
                            <span class="font-semibold text-primary-blue">₦250,000 - ₦350,000</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-primary-blue h-2.5 rounded-full" style="width: 50%"></div>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">1-3 years experience</p>
                    </div>
                    
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-medium">Senior Level</span>
                            <span class="font-semibold text-primary-blue">₦400,000 - ₦600,000</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-primary-blue h-2.5 rounded-full" style="width: 75%"></div>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">3-5 years experience</p>
                    </div>
                    
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-medium">Lead/Expert Level</span>
                            <span class="font-semibold text-primary-blue">₦600,000+</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-primary-blue h-2.5 rounded-full" style="width: 100%"></div>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">5+ years experience</p>
                    </div>
                </div>
                
                <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                    <p class="text-sm text-gray-600 italic">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                        These figures represent average salaries in Nigeria. Remote work for international companies can offer significantly higher compensation.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enrollment CTA -->
<section class="py-16 bg-gradient-to-r from-primary-blue to-primary-purple text-white">
    <div class="container mx-auto px-4 md:px-8 text-center">
        <h2 class="text-2xl md:text-4xl font-bold mb-6" data-aos="fade-up">Ready to Start Your Web Development Journey?</h2>
        <p class="text-xl opacity-90 mb-8 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Join thousands of students who have transformed their careers with our structured learning path. Start building real-world projects and land your dream job in tech.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="200">
            <button class="btn-white px-8 py-3 rounded-full font-semibold text-primary-blue">
                Enroll Now for ₦35,000
            </button>
            <button class="btn-outline-white px-8 py-3 rounded-full font-semibold text-white border border-white">
                Download Detailed Syllabus
            </button>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 md:px-8">
        <h2 class="text-2xl md:text-3xl font-bold mb-2 text-center" data-aos="fade-up">
            Success Stories
        </h2>
        <p class="text-gray-600 max-w-3xl mx-auto text-center mb-12" data-aos="fade-up" data-aos-delay="100">
            See how our students have transformed their careers through our Web Development program.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Student" class="w-16 h-16 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-bold">Oluwaseun A.</h4>
                        <p class="text-gray-500 text-sm">Frontend Developer at Paystack</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    "Before Koyify, I was working as a bank teller earning ₦80,000 monthly. After completing the web development course, I landed a job as a frontend developer at Paystack with a 250% salary increase. The practical projects really helped me build a strong portfolio."
                </p>
                <div class="flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Student" class="w-16 h-16 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-bold">Chioma E.</h4>
                        <p class="text-gray-500 text-sm">Freelance Web Developer</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    "As a stay-at-home mom, I needed a flexible career. The web development course gave me the skills to start freelancing. I now earn around ₦300,000 monthly working part-time for clients in Nigeria and abroad, all while caring for my family."
                </p>
                <div class="flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Student" class="w-16 h-16 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-bold">Adebayo O.</h4>
                        <p class="text-gray-500 text-sm">Full-Stack Developer at Flutterwave</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    "I graduated with a degree in Chemical Engineering but couldn't find a job for a year. After learning web development at Koyify, I was hired as a junior developer within 2 months. Now I'm a full-stack developer at Flutterwave earning over ₦500,000 monthly."
                </p>
                <div class="flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 md:px-8">
        <h2 class="text-2xl md:text-3xl font-bold mb-2 text-center" data-aos="fade-up">
            Frequently Asked Questions
        </h2>
        <p class="text-gray-600 max-w-3xl mx-auto text-center mb-12" data-aos="fade-up" data-aos-delay="100">
            Get answers to common questions about our Web Development career path.
        </p>
        
        <div class="max-w-3xl mx-auto">
            <div class="mb-6" data-aos="fade-up" data-aos-delay="100">
                <button class="flex items-center justify-between w-full text-left font-semibold p-4 bg-gray-50 hover:bg-gray-100 rounded-lg">
                    <span>Do I need prior programming experience?</span>
                    <i class="fas fa-chevron-down text-gray-400"></i>
                </button>
                <div class="bg-gray-50 p-4 rounded-lg mt-2">
                    <p class="text-gray-700">
                        No, our course is designed for complete beginners. We start with the basics and gradually build up to more advanced concepts. All you need is basic computer skills and the willingness to learn.
                    </p>
                </div>
            </div>
            
            <div class="mb-6" data-aos="fade-up" data-aos-delay="150">
                <button class="flex items-center justify-between w-full text-left font-semibold p-4 bg-gray-50 hover:bg-gray-100 rounded-lg">
                    <span>How much time do I need to commit each week?</span>
                    <i class="fas fa-chevron-down text-gray-400"></i>
                </button>
                <div class="bg-gray-50 p-4 rounded-lg mt-2">
                    <p class="text-gray-700">
                        For optimal results, we recommend dedicating at least 15-20 hours per week to learning and practicing. Students who can commit full-time (40+ hours weekly) typically complete the course faster and see results sooner.
                    </p>
                </div>
            </div>
            
            <div class="mb-6" data-aos="fade-up" data-aos-delay="200">
                <button class="flex items-center justify-between w-full text-left font-semibold p-4 bg-gray-50 hover:bg-gray-100 rounded-lg">
                    <span>Will I get job placement assistance?</span>
                    <i class="fas fa-chevron-down text-gray-400"></i>
                </button>
                <div class="bg-gray-50 p-4 rounded-lg mt-2">
                    <p class="text-gray-700">
                        Yes, we provide job placement support including resume reviews, interview preparation, and connections with our hiring partners. Our career services team works with you to improve your chances of landing a job quickly after graduation.
                    </p>
                </div>
            </div>
            
            <div class="mb-6" data-aos="fade-up" data-aos-delay="250">
                <button class="flex items-center justify-between w-full text-left font-semibold p-4 bg-gray-50 hover:bg-gray-100 rounded-lg">
                    <span>What kind of computer do I need?</span>
                    <i class="fas fa-chevron-down text-gray-400"></i>
                </button>
                <div class="bg-gray-50 p-4 rounded-lg mt-2">
                    <p class="text-gray-700">
                        Any modern computer (Windows, Mac, or Linux) with at least 4GB of RAM will work. You'll need reliable internet access to watch video lessons and access the course materials. A smartphone is not sufficient for development work.
                    </p>
                </div>
            </div>
            
            <div class="mb-6" data-aos="fade-up" data-aos-delay="300">
                <button class="flex items-center justify-between w-full text-left font-semibold p-4 bg-gray-50 hover:bg-gray-100 rounded-lg">
                    <span>What if I get stuck or need help?</span>
                    <i class="fas fa-chevron-down text-gray-400"></i>
                </button>
                <div class="bg-gray-50 p-4 rounded-lg mt-2">
                    <p class="text-gray-700">
                        You'll have access to our community forum where you can ask questions and get help from instructors and fellow students. We also offer weekly live Q&A sessions and one-on-one mentoring options for students who need additional support.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Learning CTA -->
<section class="py-16 bg-gray-900 text-white">
    <div class="container mx-auto px-4 md:px-8 text-center">
        <h2 class="text-2xl md:text-4xl font-bold mb-6" data-aos="fade-up">
            Start Your Web Development Career Today
        </h2>
        <p class="text-xl opacity-90 mb-8 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Join over 5,000 students who have transformed their lives through our tech education programs.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="200">
            <button class="btn-primary px-8 py-3 rounded-full font-semibold text-white">
                Enroll Now
            </button>
            <button class="btn-outline-white px-8 py-3 rounded-full font-semibold text-white border border-white flex items-center justify-center">
                <i class="fas fa-calendar-alt mr-2"></i> Schedule a Free Consultation
            </button>
        </div>
    </div>
</section>
@endsection