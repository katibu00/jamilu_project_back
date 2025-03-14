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
    @include('landing.layouts.header')

    @yield('content')
    <!-- Footer -->
    @include('landing.layouts.footer')
 
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