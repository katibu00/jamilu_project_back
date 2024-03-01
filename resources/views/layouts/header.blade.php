<header id="header" class="full-header header-size-md" data-mobile-sticky="true">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{ route('homepage') }}">
                        <img class="logo-default" srcset="/logo1.png, /logo1.png 2x" src="/logo1.png"  alt="Skillify Logo">
                    </a>
                </div><!-- #logo end -->

                <div class="header-misc ms-0">

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i class="bi-x-lg"></i></a>
                    </div><!-- #top-search end -->

                    @guest
                    <div class="header-misc">
                        <a href="{{ route('login') }}" class="button button-border border-default px-4 rounded-1 fw-medium text-transform-none ls-0 m-0 px-3 h-op-09">Sign In</a>
                    </div>
                    @endguest
                   
                    @auth
                    <!-- Top Account
                    ============================================= -->
                    <div class="header-misc-icon">
                        <a href="#" id="notifylink" data-bs-toggle="dropdown" data-bs-offset="0,15" aria-haspopup="true" aria-expanded="false" data-offset="12,12"><i class="bi-bell notification-badge"></i></a>
                        <div class="dropdown-menu dropdown-menu-end py-0 m-0 overflow-auto" aria-labelledby="notifylink" style="width: 320px; max-height: 300px">
                            <span class="dropdown-header border-bottom border-f5 fw-medium text-uppercase ls-1">Notifications</span>
                            <div class="list-group list-group-flush">
                                {{-- <a href="#" class="d-flex list-group-item">
                                    <img src="/assets/demos/articles/images/authors/2.jpg" width="35" height="35" class="rounded-circle me-3 mt-1" alt="Profile">
                                    <div class="media-body">
                                        <h5 class="my-0 fw-normal text-muted"><span class="text-dark fw-bold">SemiColonWeb</span> has replied on your post <span class="text-dark fw-bold">Package Generator – Approx time for a file.</span></h5>
                                        <small class="text-smaller">10 mins ago</small>
                                    </div>
                                </a> --}}
                                {{-- <a href="#" class="d-flex list-group-item">
                                    <i class="bi-check-lg badge-icon bg-success text-white me-3 mt-1"></i>
                                    <div class="media-body">
                                        <h5 class="my-0 fw-normal text-muted"><span class="text-dark fw-bold">SemiColonWeb</span> has marked to your post as solved.</h5>
                                        <small class="text-smaller">2 days ago</small>
                                    </div>
                                </a> --}}
                            </div>
                        </div>
                    </div>

                    <!-- Top Account
                    ============================================= -->
                    <div class="header-misc-icon profile-image">
                        <a href="#" id="profilelink" data-bs-toggle="dropdown" data-bs-offset="0,15" aria-haspopup="true" aria-expanded="false" data-offset="12,12"><img class="rounded-circle" src="{{ Auth::user()->profile_image ? asset('/'.Auth::user()->profile_image) : asset('/uploads/default.png') }}"  alt="User"></a>
                        <div class="dropdown-menu dropdown-menu-end py-0 m-0" aria-labelledby="profilelink">
                            <a class="dropdown-item" href="demo-forum-edit.html"><i class="bi-pencil-square me-2"></i>Edit Profile</a>
                            {{-- <a class="dropdown-item" href="demo-forum-single.html"><i class="bi-text-left me-2"></i>Your Topics</a> --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="bi-box-arrow-right me-2"></i>Sign Out</a>
                        </div>
                    </div>
                    @endauth

                </div>

                <div class="primary-menu-trigger">
                    <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                        <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                    </button>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu">

                    @php
                        $prefix = Request::route()->getPrefix();
                        $route = Route::current()->getName();
                    @endphp

                  @auth
                      @if(auth()->user()->role == 'instructor')
                        @include('layouts.headers.instructor')
                      @endif
                      @if(auth()->user()->role == 'student')
                        @include('layouts.headers.student')
                      @endif
                  @endauth
                  @guest
                      @include('layouts.headers.guest')
                  @endguest

                </nav><!-- #primary-menu end -->

                <form class="top-search-form bg-alt dark" action="search.html" method="get">
                    <div class="container row justify-content-center">
                        <div class="col-sm-8">
                            <input type="text" name="q" class="form-control form-control-lg mb-5 border-color" value="" placeholder="Type Your Query &amp; Hit Enter.." autocomplete="off">
                            <div class="row col-mb-30">
                                <div class="col-md-6">
                                    <div class="widget widget_links">
                                        <h4 class="">Recent Topics</h4>
                                        <ul>
                                            <li><a href="demo-forum-single.html">Package Generator – Approx time for a file</a></li>
                                            <li><a href="demo-forum-single.html">Open sub-menu touching menu-item name</a></li>
                                            <li><a href="demo-forum-single.html">Portfolio Overlay Slide fadein fadeout</a></li>
                                            <li><a href="demo-forum-single.html">Show menu .dropdown-menu down only</a></li>
                                            <li><a href="demo-forum-single.html">Couldnt Generate Package Snippet</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="widget widget_links">
                                        <h4 class="">Helpful Documentation</h4>
                                        <ul>
                                            <li><a href="demo-forum-single.html">How to Install</a></li>
                                            <li><a href="demo-forum-single.html">How to setup Niche Demos</a></li>
                                            <li><a href="demo-forum-single.html">Header Layouts and Styles</a></li>
                                            <li><a href="demo-forum-single.html">Setup Forms</a></li>
                                            <li><a href="demo-forum-single.html">Setup RTL</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->