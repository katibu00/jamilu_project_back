<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Koyify</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .login-gradient {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -10;
            overflow: hidden;
        }

        .login-gradient::before {
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

        .gradient-text {
            background: linear-gradient(90deg, var(--primary-blue), var(--primary-green));
            -webkit-background-clip: text;
            background-clip: text;
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

        .input-icon {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            color: var(--primary-blue);
        }

        .input-with-icon {
            padding-left: 3rem;
        }

        .wave-divider {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            z-index: -5;
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

        .glassmorphism {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .dot-pattern {
            background-image: radial-gradient(var(--secondary-blue) 1px, transparent 1px);
            background-size: 20px 20px;
        }

        /* Password visibility toggle */
        .password-toggle {
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--primary-blue);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            opacity: 1;
        }

        .field-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
            padding-left: 35px;
            cursor: pointer;
            user-select: none;
            display: flex;
            align-items: center;
        }

        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #eee;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .custom-checkbox:hover input ~ .checkmark {
            background-color: #ccc;
        }

        .custom-checkbox input:checked ~ .checkmark {
            background: linear-gradient(90deg, var(--primary-green), var(--secondary-blue));
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }

        .custom-checkbox .checkmark:after {
            left: 7px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .login-container {
            width: 100%;
            max-width: 28rem;
            padding: 1rem;
            margin: 2rem auto;
        }

        .login-card {
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        /* Fade in animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.8s ease forwards;
        }

        /* Mobile optimizations */
        @media (max-width: 768px) {
            .login-container {
                padding: 1rem;
                margin: 1rem auto;
            }
            
            .login-card {
                padding: 1.5rem !important;
            }

            h1 {
                font-size: 1.75rem !important;
            }

            .wave-divider {
                height: 40px;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 0.75rem;
            }
            
            .login-card {
                padding: 1.25rem !important;
            }
        }
    </style>
</head>

<body>
    <div class="login-gradient dot-pattern"></div>
    
    <div class="wave-divider">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
    
    <div class="login-container fade-in">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-white mb-3">Welcome to <span class="gradient-text">Koyify</span></h1>
            <p class="text-white text-opacity-80">Your journey to tech excellence starts here</p>
        </div>
        
        <div class="glassmorphism rounded-2xl p-6 md:p-8 login-card">
            <div class="flex justify-center mb-6">
                <img src="/api/placeholder/60/60" alt="Koyify Logo" class="h-14 w-auto">
            </div>
            
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Sign In</h2>
            
            <form>
                <div class="field-group">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email or Phone Number</label>
                    <div class="relative">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-transparent transition duration-200 input-with-icon" placeholder="Enter your email or phone number">
                    </div>
                </div>
                
                <div class="field-group">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password" name="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-transparent transition duration-200 input-with-icon" placeholder="Enter your password">
                        <i class="fas fa-eye password-toggle" id="passwordToggle"></i>
                    </div>
                </div>
                
                <div class="flex flex-wrap justify-between items-center mb-6">
                    <label class="custom-checkbox text-sm text-gray-700 mb-2 md:mb-0">
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                        <span class="ml-2">Keep me logged in</span>
                    </label>
                    
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800 transition duration-200">Forgot Password?</a>
                </div>
                
                <button type="submit" class="btn-primary w-full py-3 rounded-lg text-white font-medium">
                    Sign In
                </button>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-600">Don't have an account? <a href="#" class="text-blue-600 font-medium hover:text-blue-800 transition duration-200">Register Now</a></p>
                </div>
            </form>
        </div>
        
        <div class="mt-4 text-center">
            <a href="#" class="text-white text-opacity-80 hover:text-opacity-100 transition duration-200">Back to Home</a>
        </div>
    </div>
    
    <!-- Scripts -->
    <script>
        // Password visibility toggle
        document.getElementById('passwordToggle').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.classList.remove('fa-eye');
                passwordToggle.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordToggle.classList.remove('fa-eye-slash');
                passwordToggle.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>