<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koyify - Launch Your Tech Career in Nigeria</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary-blue: #0A2463;
            --secondary-blue: #3E92CC;
            --primary-green: #1CA664;
            --accent-yellow: #F5CB5C;
            --dark-text: #333333;
            --light-text: #F8F9FA;
        }

        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        .hero-gradient {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-gradient::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='white' fill-opacity='0.05' fill-rule='evenodd'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
        }

        .custom-shadow {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .gradient-text {
            background: linear-gradient(90deg, var(--primary-blue), var(--primary-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-primary {
            background: linear-gradient(90deg, var(--primary-green), var(--secondary-blue));
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, var(--secondary-blue), var(--primary-green));
            border-radius: inherit;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-primary:hover::after {
            opacity: 1;
        }

        .btn-secondary {
            background: white;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        }

        .feature-icon {
            transition: all 0.3s ease;
        }

        .card-hover:hover .feature-icon {
            transform: scale(1.1);
        }

        .wave-divider {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .wave-divider svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 70px;
        }

        .wave-divider .shape-fill {
            fill: #FFFFFF;
        }

        .course-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 10;
        }

        .glassmorphism {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .progress-bar {
            height: 4px;
            background: linear-gradient(90deg, var(--primary-green), var(--secondary-blue));
            width: 0;
            transition: width 0.3s ease;
        }

        .language-toggle {
            position: relative;
        }

        .language-toggle .toggle-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background-color: var(--primary-blue);
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .language-toggle.hausa .toggle-slider {
            left: 50%;
        }

        .career-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .career-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .career-stat {
            display: inline-block;
            margin-right: 1rem;
            font-weight: 600;
        }

        .career-stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-blue);
            display: block;
        }

        .career-stat-label {
            font-size: 0.875rem;
            color: var(--dark-text);
            opacity: 0.7;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        .dot-pattern {
            background-image: radial-gradient(var(--secondary-blue) 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .bootcamp-gradient {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #1e3a8a 100%);
        }

        .career-path-heading {
            position: relative;
            display: inline-block;
        }

        .career-path-heading::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-green), var(--secondary-blue));
            border-radius: 2px;
        }

        .highlighted-text {
            background: linear-gradient(120deg, rgba(28, 166, 100, 0.2), rgba(62, 146, 204, 0.2));
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-weight: 600;
        }

        /* Mobile language toggle adjustment */
        @media (max-width: 768px) {
            .mobile-language-toggle {
                position: absolute;
                right: 60px;
                top: 14px;
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Progress Bar -->
    <div class="progress-bar fixed top-0 left-0 w-0 z-50" id="progressBar"></div>

    <!-- Header/Navigation -->
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

    <!-- Enhanced Hero Section -->
    <section class="hero-gradient text-white relative">
        <div class="container mx-auto px-4 py-20 md:py-28">
            <div class="flex flex-col md:flex-row items-center relative z-10">
                <div class="md:w-1/2 mb-12 md:mb-0" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 leading-tight">
                        Launch Your <span class="text-yellow-300">Tech Career</span> in Nigeria
                    </h1>
                    <p class="text-lg md:text-xl mb-8 text-blue-100">
                        Get job-ready skills in high-demand tech fields, taught in <span class="font-bold">Hausa or
                            English</span>. Break into the tech industry and earn up to 3x more than traditional
                        careers.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="/ai-advisor"
                            class="btn-primary text-center text-white font-bold px-8 py-4 rounded-lg transition flex items-center justify-center">
                            <span>Find Your Tech Path</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </a>
                        <a href="/courses"
                            class="btn-secondary text-center text-blue-900 font-bold px-8 py-4 rounded-lg transition transform hover:scale-105 flex items-center justify-center">
                            <span>Browse Courses</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 relative" data-aos="fade-left" data-aos-duration="1000">
                    <div class="absolute -top-16 -right-16 w-32 h-32 bg-yellow-400 rounded-full opacity-20 floating">
                    </div>
                    <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-green-400 rounded-full opacity-20 floating"
                        style="animation-delay: 2s;"></div>

                    <div class="relative z-10 rounded-xl overflow-hidden shadow-2xl border-4 border-white">
                        <img src="https://via.placeholder.com/600x400/0A2463/FFFFFF?text=Launch+Your+Tech+Career"
                            alt="Nigerian youth in tech careers" class="w-full rounded-lg">

                        <!-- Floating card elements -->
                        <div class="absolute top-0 right-0 transform -translate-y-1/2 translate-x-1/4 floating"
                            style="animation-delay: 1s;">
                            <div class="glassmorphism p-3 rounded-lg">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="text-white text-sm font-medium">3x Higher Salaries</span>
                                </div>
                            </div>
                        </div>

                        <div class="absolute bottom-0 left-0 transform translate-y-1/2 -translate-x-1/4 floating"
                            style="animation-delay: 3s;">
                            <div class="glassmorphism p-3 rounded-lg">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="text-white text-sm font-medium">10,000+ Job Openings</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="wave-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- Career Paths Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-14" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold gradient-text inline-block mb-6">In-Demand Tech Careers</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Choose from these high-growth tech careers with excellent salary potential and job security in
                    Nigeria's digital economy
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-10">
                <!-- Web Development Career Card -->
                <div class="career-card bg-white border border-gray-100 overflow-hidden" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="h-48 bg-gradient-to-r from-blue-600 to-blue-800 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h3 class="text-3xl font-bold text-white">Web Development</h3>
                        </div>
                        <div class="absolute bottom-0 right-0 p-4">
                            <svg class="w-24 h-24 text-white opacity-20" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex flex-wrap mb-6">
                            <div class="career-stat mb-4">
                                <span class="career-stat-value">₦400K+</span>
                                <span class="career-stat-label">Monthly Salary</span>
                            </div>
                            <div class="career-stat mb-4">
                                <span class="career-stat-value">7,000+</span>
                                <span class="career-stat-label">Job Openings</span>
                            </div>
                            <div class="career-stat mb-4">
                                <span class="career-stat-value">4-6</span>
                                <span class="career-stat-label">Months to Job-Ready</span>
                            </div>
                        </div>

                        <p class="text-gray-600 mb-6">
                            Web developers are in <span class="highlighted-text">high demand across Nigeria</span> with
                            opportunities in tech companies, banks, e-commerce, and remote work for international
                            clients. Create websites and web applications that power businesses online.
                        </p>

                        <h4 class="font-bold text-lg text-blue-900 mb-3 career-path-heading">Career Path</h4>
                        <ul class="space-y-2 mb-6 text-gray-600">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Junior Web Developer (₦150K-250K)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Full-Stack Developer (₦300K-500K)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Senior Developer/Lead (₦500K-₦1.2M+)</span>
                            </li>
                        </ul>

                        <div class="bg-blue-50 p-4 rounded-lg mb-6">
                            <h5 class="font-bold text-blue-900 mb-2">Start Your Journey With:</h5>
                            <p class="text-blue-800">
                                <span class="font-semibold">Web Development Fundamentals</span> - Learn HTML, CSS,
                                JavaScript and responsive design principles
                            </p>
                        </div>

                        <a href="/courses/web-development"
                            class="btn-primary text-white font-bold px-6 py-3 rounded-lg transition flex items-center justify-center">
                            <span>Explore Web Development Path</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Data Analysis Career Card -->
                <div class="career-card bg-white border border-gray-100 overflow-hidden" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="h-48 bg-gradient-to-r from-purple-600 to-purple-800 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h3 class="text-3xl font-bold text-white">Data Analysis</h3>
                        </div>
                        <div class="absolute bottom-0 right-0 p-4">
                            <svg class="w-24 h-24 text-white opacity-20" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex flex-wrap mb-6">
                            <div class="career-stat mb-4">
                                <span class="career-stat-value">₦350K+</span>
                                <span class="career-stat-label">Monthly Salary</span>
                            </div>
                            <div class="career-stat mb-4">
                                <span class="career-stat-value">5,000+</span>
                                <span class="career-stat-label">Job Openings</span>
                            </div>
                            <div class="career-stat mb-4">
                                <span class="career-stat-value">3-5</span>
                                <span class="career-stat-label">Months to Job-Ready</span>
                            </div>
                        </div>

                        <p class="text-gray-600 mb-6">
                            Data analysts are <span class="highlighted-text">essential across industries</span> with
                            high demand in finance, e-commerce, and government sectors. Transform raw data into
                            actionable insights to drive business decisions.
                        </p>

                        <h4 class="font-bold text-lg text-blue-900 mb-3 career-path-heading">Career Path</h4>
                        <ul class="space-y-2 mb-6 text-gray-600">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Junior Data Analyst (₦150K-250K)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Senior Data Analyst (₦250K-450K)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Data Science Specialist (₦450K-₦900K+)</span>
                            </li>
                        </ul>

                        <div class="bg-purple-50 p-4 rounded-lg mb-6">
                            <h5 class="font-bold text-purple-900 mb-2">Start Your Journey With:</h5>
                            <p class="text-purple-800">
                                <span class="font-semibold">Data Analysis Fundamentals</span> - Learn Excel, SQL, and
                                Python for data manipulation and visualization
                            </p>
                        </div>

                        <a href="/courses/data-analysis"
                            class="btn-primary text-white font-bold px-6 py-3 rounded-lg transition flex items-center justify-center">
                            <span>Explore Data Analysis Path</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-12">
                <a href="/ai-advisor"
                    class="btn-primary text-white font-bold px-8 py-4 rounded-lg transition flex items-center justify-center">
                    <span>Find Your Perfect Tech Career</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 md:py-24 bg-gray-50 relative dot-pattern">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold gradient-text inline-block mb-6">Why Choose Koyify</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Our platform is designed to make tech education accessible and effective for everyone in Northern
                    Nigeria
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl shadow-xl p-8 transition duration-300 card-hover custom-shadow"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6 feature-icon">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Courses in Hausa & English</h3>
                    <p class="text-gray-600">
                        All our courses are available in both Hausa and English, allowing you to learn complex tech
                        concepts in the language you're most comfortable with.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-xl shadow-xl p-8 transition duration-300 card-hover custom-shadow"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6 feature-icon">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">AI-Powered Learning</h3>
                    <p class="text-gray-600">
                        Our intelligent system adapts to your learning pace, providing personalized recommendations and
                        additional support when you need it.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-xl shadow-xl p-8 transition duration-300 card-hover custom-shadow"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-yellow-100 rounded-xl flex items-center justify-center mb-6 feature-icon">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Dedicated Mentorship</h3>
                    <p class="text-gray-600">
                        Connect with experienced tech professionals who will guide your learning journey and provide
                        valuable industry insights.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                <!-- Feature 4 -->
                <div class="bg-white rounded-xl shadow-xl p-8 transition duration-300 card-hover custom-shadow"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6 feature-icon">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Flexible Learning</h3>
                    <p class="text-gray-600">
                        Study at your own pace with 24/7 access to courses. Perfect for busy professionals or students
                        with other commitments.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white rounded-xl shadow-xl p-8 transition duration-300 card-hover custom-shadow"
                    data-aos="fade-up" data-aos-delay="500">
                    <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6 feature-icon">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Job Placement Support</h3>
                    <p class="text-gray-600">
                        Get help with resume building, interview preparation, and direct connections to our network of
                        hiring partners</p>
                    </div>
                </section>
                
                <!-- Featured Courses Section -->
                <section class="py-16 md:py-24 bg-white">
                    <div class="container mx-auto px-4">
                        <div class="flex justify-between items-center mb-12" data-aos="fade-up">
                            <h2 class="text-3xl md:text-4xl font-bold gradient-text">Popular Courses</h2>
                            <a href="/courses" class="inline-flex items-center text-green-600 font-semibold hover:text-green-800 transition">
                                <span>View All Courses</span>
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            <!-- Course Card 1 -->
                            <div class="bg-white rounded-xl overflow-hidden shadow-xl transition duration-300 card-hover custom-shadow" data-aos="fade-up" data-aos-delay="100">
                                <div class="relative">
                                    <span class="course-badge bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">Most Popular</span>
                                    <img src="https://via.placeholder.com/600x340/3E92CC/FFFFFF?text=Web+Development" alt="Web Development Course" class="w-full h-52 object-cover">
                                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-blue-900 to-transparent p-4 text-white">
                                        <span class="text-lg font-semibold">Web Development Fundamentals</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Programming</span>
                                        <span class="text-sm text-gray-500">Beginner</span>
                                    </div>
                                    <h3 class="text-xl font-semibold text-blue-900 mb-2">Web Development Fundamentals</h3>
                                    <p class="text-gray-600 mb-4">Learn HTML, CSS, and JavaScript to build responsive websites from scratch.</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-green-600 font-bold">₦15,000</span>
                                        <a href="/courses/web-dev-fundamentals" class="btn-primary text-white px-4 py-2 rounded-md text-sm transition">Enroll Now</a>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Course Card 2 -->
                            <div class="bg-white rounded-xl overflow-hidden shadow-xl transition duration-300 card-hover custom-shadow" data-aos="fade-up" data-aos-delay="200">
                                <div class="relative">
                                    <span class="course-badge bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full">Bestseller</span>
                                    <img src="https://via.placeholder.com/600x340/4CB944/FFFFFF?text=MS+Office" alt="Microsoft Office Course" class="w-full h-52 object-cover">
                                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-blue-900 to-transparent p-4 text-white">
                                        <span class="text-lg font-semibold">Microsoft Office Masterclass</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Office Skills</span>
                                        <span class="text-sm text-gray-500">All Levels</span>
                                    </div>
                                    <h3 class="text-xl font-semibold text-blue-900 mb-2">Microsoft Office Masterclass</h3>
                                    <p class="text-gray-600 mb-4">Master Word, Excel, and PowerPoint for professional workplace productivity.</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-green-600 font-bold">₦10,000</span>
                                        <a href="/courses/ms-office-masterclass" class="btn-primary text-white px-4 py-2 rounded-md text-sm transition">Enroll Now</a>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Course Card 3 -->
                            <div class="bg-white rounded-xl overflow-hidden shadow-xl transition duration-300 card-hover custom-shadow" data-aos="fade-up" data-aos-delay="300">
                                <div class="relative">
                                    <span class="course-badge bg-yellow-600 text-white text-xs font-bold px-3 py-1 rounded-full">New</span>
                                    <img src="https://via.placeholder.com/600x340/FFD700/333333?text=Python" alt="Python Programming Course" class="w-full h-52 object-cover">
                                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-blue-900 to-transparent p-4 text-white">
                                        <span class="text-lg font-semibold">Python for Data Analysis</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Programming</span>
                                        <span class="text-sm text-gray-500">Intermediate</span>
                                    </div>
                                    <h3 class="text-xl font-semibold text-blue-900 mb-2">Python for Data Analysis</h3>
                                    <p class="text-gray-600 mb-4">Learn Python programming with focus on data analysis and visualization.</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-green-600 font-bold">₦20,000</span>
                                        <a href="/courses/python-data-analysis" class="btn-primary text-white px-4 py-2 rounded-md text-sm transition">Enroll Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Bootcamp Section -->
                <section class="py-16 md:py-24 bootcamp-gradient text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-400 rounded-full opacity-10" style="transform: translate(30%, -30%);"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-green-400 rounded-full opacity-10" style="transform: translate(-30%, 30%);"></div>
                    <div class="container mx-auto px-4 relative z-10">
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/2 mb-12 md:mb-0" data-aos="fade-right" data-aos-duration="1000">
                                <h2 class="text-3xl md:text-4xl font-bold mb-6">Intensive Tech Bootcamps</h2>
                                <p class="text-xl mb-8 text-blue-100">
                                    Join our immersive bootcamps and become job-ready in just 12 weeks. Learn directly from industry experts and build real-world projects.
                                </p>
                                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                                    <a href="/bootcamps" class="btn-primary text-white font-bold px-8 py-4 rounded-lg transition flex items-center justify-center">
                                        <span>View Upcoming Bootcamps</span>
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="md:w-1/2" data-aos="fade-left" data-aos-duration="1000">
                                <div class="bg-white p-8 rounded-xl text-gray-800 custom-shadow">
                                    <div class="flex items-center justify-between mb-6">
                                        <h3 class="text-2xl font-bold text-blue-900">Full-Stack Web Development</h3>
                                        <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">Next Cohort</span>
                                    </div>
                                    <ul class="space-y-4 mb-8">
                                        <li class="flex items-center">
                                            <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="font-medium">Starting: April 15, 2025</span>
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="font-medium">Duration: 12 weeks, 20hrs/week</span>
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            <span class="font-medium">Limited to 30 participants</span>
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="font-medium">Job placement assistance included</span>
                                        </li>
                                    </ul>
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <span class="block text-gray-500 text-sm">Regular Price</span>
                                            <span class="text-2xl font-bold text-green-600">₦150,000</span>
                                        </div>
                                        <div class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-md">
                                            <span class="font-bold">Early Bird: 20% Off</span>
                                        </div>
                                    </div>
                                    <a href="/bootcamps/web-development" class="block w-full btn-primary text-white text-center font-bold px-4 py-4 rounded-lg transition">
                                        Apply Now - Limited Spots!
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Our Approach Section -->
    <section class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold gradient-text inline-block mb-6">Our Unique Approach</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Koyify is revolutionizing tech education in Northern Nigeria through innovative learning methods
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Approach Card 1 -->
                <div class="bg-white p-8 rounded-xl shadow-xl text-center custom-shadow card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mb-6 mx-auto feature-icon">
                        <i class="fas fa-language text-blue-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Hausa-First Learning</h3>
                    <p class="text-gray-600">
                        All courses available in both Hausa and English, removing language barriers to technology education
                    </p>
                </div>
                
                <!-- Approach Card 2 -->
                <div class="bg-white p-8 rounded-xl shadow-xl text-center custom-shadow card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-6 mx-auto feature-icon">
                        <i class="fas fa-chalkboard-teacher text-green-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Flexible Learning</h3>
                    <p class="text-gray-600">
                        Choose between self-paced courses or instructor-led sessions based on your schedule and learning style
                    </p>
                </div>
                
                <!-- Approach Card 3 -->
                <div class="bg-white p-8 rounded-xl shadow-xl text-center custom-shadow card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mb-6 mx-auto feature-icon">
                        <i class="fas fa-robot text-yellow-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">AI-Powered</h3>
                    <p class="text-gray-600">
                        Smart learning analytics and personalized recommendations to maximize your learning potential
                    </p>
                </div>
                
                <!-- Approach Card 4 -->
                <div class="bg-white p-8 rounded-xl shadow-xl text-center custom-shadow card-hover" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mb-6 mx-auto feature-icon">
                        <i class="fas fa-mobile-alt text-purple-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Mobile Optimized</h3>
                    <p class="text-gray-600">
                        Learn anywhere, anytime on your smartphone or tablet with our low-data optimization
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 md:py-24 bg-gradient-to-r from-green-600 to-blue-700 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 opacity-10">
            <svg width="404" height="404" fill="none" viewBox="0 0 404 404">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" fill="currentColor"></rect>
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"></rect>
            </svg>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <div data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Start Your Tech Journey?</h2>
                <p class="text-xl mb-10 max-w-3xl mx-auto">
                    Take our AI-powered career assessment and get a personalized learning path that matches your goals and abilities.
                </p>
                <a href="/ai-advisor" class="inline-block bg-white text-blue-900 font-bold px-10 py-5 rounded-xl text-xl transition transform hover:scale-105 hover:shadow-lg flex items-center justify-center mx-auto" style="max-width: 400px;">
                    <span>Get Your Free Career Plan</span>
                    <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
 
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialize AOS animation library
        AOS.init();
        
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('mobile-menu-icon');
            
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                menuIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            } else {
                mobileMenu.classList.add('hidden');
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16m-7 6h7');
            }
        });
        
        // Progress Bar on Scroll
        window.addEventListener('scroll', function() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('progressBar').style.width = scrolled + '%';
        });
        
        // Language Toggle
        const languageToggles = document.querySelectorAll('.language-toggle');
        
        languageToggles.forEach(toggle => {
            const buttons = toggle.querySelectorAll('button');
            
            buttons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    if (index === 0) { // English
                        toggle.classList.remove('hausa');
                    } else { // Hausa
                        toggle.classList.add('hausa');
                    }
                });
            });
        });
    </script>
 </body>
 </html>