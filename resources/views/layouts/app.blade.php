<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="author" content="SemiColonWeb">
	<meta name="description" content="">

	<!-- Font Imports -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Core Style -->
	<link rel="stylesheet" href="/assets/css/style.css">

	<!-- Font Icons -->
	<link rel="stylesheet" href="/assets/css/font-icons.css">

	<!-- Niche Demos -->
	<link rel="stylesheet" href="/assets/demos/forum/forum.css">
	<link rel="stylesheet" href="/toastr/toastr.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="/assets/css/custom.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Document Title
	============================================= -->
	<title>@yield('pageTitle') | Skillify</title>
    <style>
		.top-links li a img {
            position: relative;
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 20px;
            top: -1px;
            margin-right: 8px;
            border: 1px solid rgba(255, 255, 255, 0.7);
        }
	</style>
	@yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="stretched search-overlay">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper">

        <!-- Top Bar
		============================================= -->
		@guest
			@include('layouts.topbar')
		@endguest

		<!-- Header
		============================================= -->
		@include('layouts.header')

		<!-- Slider
		============================================= -->
		
		<!-- Content
		============================================= -->
		@yield('content')

		<!-- Footer
		============================================= -->
		@include('layouts.footer')

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="uil uil-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="/assets/js/plugins.min.js"></script>
	<script src="/assets/js/jquery.js"></script>
	<script src="/assets/js/functions.bundle.js"></script>
    @yield('js')
	<script src="/toastr/toastr.min.js"></script>


	</body>
	</html>