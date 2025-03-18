<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skillify - Empower Your Future</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @yield('css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    @include('layouts.header')
    
    <main class="flex-grow">
        @yield('content')
    </main>
    
    @include('layouts.footer')
    
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>