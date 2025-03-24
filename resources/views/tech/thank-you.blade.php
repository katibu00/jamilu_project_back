<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Koyify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .dotted-border {
            border: 3px dotted #6366F1;
            border-radius: 12px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-purple-50 font-sans text-gray-800">
    <div class="container mx-auto px-4 py-16">
        <div class="text-center mb-8">
            <h1 class="text-4xl md:text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600 mb-4">Koyify.com</h1>
            <p class="text-lg md:text-xl text-indigo-800 font-medium">Unlocking Tech Careers for Northern Nigeria</p>
        </div>
        
        <div class="dotted-border bg-white p-8 mb-10 shadow-lg max-w-2xl mx-auto text-center">
            <div class="text-green-500 mb-4">
                <i class="fas fa-check-circle text-6xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-indigo-700 mb-4">Thank You for Joining!</h2>
            <p class="text-lg mb-6">Your application has been received successfully. We're excited to have you join our tech community!</p>
            
            <div class="bg-green-100 p-6 rounded-lg mb-6">
                <h3 class="font-bold text-green-800 mb-2">Next Steps:</h3>
                <p class="mb-4">Click the button below to join our WhatsApp community for exclusive updates and early access:</p>
                <a href="https://chat.whatsapp.com/YOURGROUPLINK" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 shadow-md">
                    <i class="fab fa-whatsapp mr-2"></i> Join WhatsApp Group
                </a>
            </div>
            
            <p class="text-gray-600">You'll receive important updates and announcements about our launch via WhatsApp and email.</p>
        </div>
        
        <div class="text-center">
            <a href="{{ route('get-into-tech') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                <i class="fas fa-arrow-left mr-2"></i> Back to Home
            </a>
        </div>
        
        <div class="text-center mt-12 text-gray-600 text-sm">
            <p>&copy; 2025 Koyify.com - Empowering Northern Nigeria with Tech Skills</p>
        </div>
    </div>
</body>
</html>