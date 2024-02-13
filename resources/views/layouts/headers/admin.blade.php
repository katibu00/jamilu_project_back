    <!--==============================
    Mobile Menu
  ============================== -->
  <div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="index.html"><img src="/assets/img/logo.svg" alt="Edura"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="about.html">About Us</a></li>
                        <li class="menu-item-has-children">
                            <a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-details.html">Shop Details</a></li>
                                <li><a href="cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                            </ul>
                        </li>
                        <li><a href="event.html">Events</a></li>
                        <li><a href="event-details.html">Event Details</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="error.html">Error Page</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--==============================
Header Area
==============================-->
<header class="th-header header-layout-default">
    <div class="logo-bg-half"></div>
    <div class="header-top">
        <div class="container-fluid">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <style>
                        .header-links ul {
                            list-style: none;
                            padding: 0;
                            margin: 0;
                            display: flex;
                            align-items: center;
                        }

                        .header-links li {
                            margin-right: 20px;
                        }

                        .header-links a {
                            text-decoration: none;
                            color: #fff;
                            font-weight: bold;
                        }

                        .header-links a.active {
                            text-decoration: underline;
                            color: #ffd700;
                        }
                    </style>
                    <div class="header-links">
                        <ul>
                            <li><a href="#individuals" class="active">Individuals</a></li>
                            <li><a href="#universities">Universities</a></li>
                            <li><a href="#governments">Governments</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <style>
                        .language-selection {
                            position: relative;
                        }
    
                        .language-selection select:hover {
                            cursor: pointer;
                        }
    
                        @media (max-width: 767px) {
                            .language-selection select {
                                width: 100%;
                                margin-top: 0px;
                                margin-bottom: 0px;
                            }
                        }
    
                        .header-right ul {
                            display: flex;
                            flex-direction: row;
                            align-items: center;
                            justify-content: space-between;
                        }
    
                        @media (max-width: 767px) {
                            .header-right ul {
                                flex-direction: row;
                            }
    
                            .header-right li {
                                margin-bottom: 0;
                            }
    
                            .header-right .language-selection {
                                margin-right: 10px;
                            }
                        }
    
                        .user-avatar {
                            border-radius: 50%;
                        }
    
                        #languageDropdown {
                            height: 25px;
                            width: 130px;
                            font-size: 16px;
                            background-color: white;
                            color: black;
                        }
    
                        #languageDropdown::after {
                            color: black;
                        }
    
                        #languageDropdown option {
                            padding: 8px;
                        }
                    </style>
                    <div class="header-links header-right">
                        <ul>
                            <li>
                                <div class="language-selection">
                                    <select id="languageDropdown">
                                        <option value="english">English</option>
                                        <option value="pidgin">Pidgin</option>
                                        <option value="hausa">Hausa</option>
                                        <option value="igbo">Igbo</option>
                                    </select>
                                </div>
                            </li>
                            <li class="list-inline-item d-block d-sm-inline-block">
                                @guest
                                    <i class="far fa-user"></i><a href="{{ route('login') }}">Login/Register</a>
                                @else
                                    <i class="fas fa-book"></i><a href="#">My Learning</a>
                                @endguest
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-auto">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header-logo">
                                    <a href="index.html"><img src="/assets/img/logo-white.svg" alt="Edura"></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <nav class="main-menu d-none d-lg-inline-block">
                                    <ul>
                                       
                                        <li class="menu-item-has-children">
                                            <a href="#">Blog</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                                <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <div class="row">
                            <div class="col-auto">
                                <div class="header-button">


                                    <div class="dropdown">
                                        <button class="icon-btn sideMenuToggler dropdowln-toggle" type="button"
                                            id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="far fa-bell"></i>
                                            <span class="badge rounded-pill bg-danger">4</span> </button>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="notificationDropdown">
                                            <li><a class="dropdown-item" href="#">Notification 1</a></li>
                                            <li><a class="dropdown-item" href="#">Notification 2</a></li>
                                            <li><a class="dropdown-item" href="#">Notification 3</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">View All Notifications</a></li>
                                        </ul>
                                    </div>

                                    <div class="dropdown">
                                        <button class="th-btn dropdown-toggle" type="button" id="userDropdown"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="/default.png" width="50px" alt="User Avatar"
                                                class="user-avatar">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                            <li><a class="dropdown-item" href="#">Profile</a></li>
                                            <li><a class="dropdown-item" href="#">Courses</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-bg"></div>
        </div>
    </div>
</header>