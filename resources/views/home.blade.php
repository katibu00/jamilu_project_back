@extends('layouts.app')
@section('pageTitle', 'Home')
@section('css')


    <style>
        /* Custom CSS for career tabs and cards */
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            background: #fefefe;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-subtitle {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .card-text {
            color: #555;
            line-height: 1.6;
        }

        .nav-tabs .nav-item .nav-link {
            color: #333;
            font-weight: bold;
            background-color: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            border-radius: 0;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-item .nav-link.active {
            border-color: #007bff;
        }

        .nav-tabs .nav-item .nav-link:hover {
            background-color: rgba(0, 123, 255, 0.1);
            border-color: #007bff;
        }

        .career-tab-content {
            padding-top: 20px;
        }

        .list-unstyled {
            padding-left: 20px;
        }

        .contact-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .contact-button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
@section('content')
    <div class="desktop-margin"></div>
    @include('layouts.slider')


    <section id="content">
        <div class="content-wrap">




            <section class="container py-5" style="margin-top: -70px;">


                <div class="heading-block border-bottom-0 mb-5 text-center">
                    <h3>Most Popular Courses</h3>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla natus mollitia ipsum.
                        Voluptatibus, perspiciatis placeat.</span>
                </div>

                <div class="clear"></div>

                <ul class="nav nav-tabs" id="careerTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="webDev-tab" data-toggle="tab" href="#webDev" role="tab"
                            aria-controls="webDev" aria-selected="true">Web Development</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="digitalMarketing-tab" data-toggle="tab" href="#digitalMarketing"
                            role="tab" aria-controls="digitalMarketing" aria-selected="false">Digital Marketing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dataAnalysis-tab" data-toggle="tab" href="#dataAnalysis" role="tab"
                            aria-controls="dataAnalysis" aria-selected="false">Data Analysis using Excel</a>
                    </li>
                </ul>
                <div class="tab-content career-tab-content" id="careerTabsContent">
                    <!-- Web Development Tab -->
                    <div class="tab-pane fade show active" id="webDev" role="tabpanel" aria-labelledby="webDev-tab">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Web Development</h5>
                                <h6 class="card-subtitle">Overview:</h6>
                                <p class="card-text">Web development involves creating websites and web applications using
                                    programming languages such as HTML, CSS, and JavaScript. It also includes knowledge of
                                    frameworks and libraries like React, Angular, or Vue.js.</p>
                                <h6 class="card-subtitle">Skills Required:</h6>
                                <ul class="card-text list-unstyled">
                                    <li>HTML5</li>
                                    <li>CSS3</li>
                                    <li>JavaScript (ES6+)</li>
                                    <li>Responsive design</li>
                                    <li>Version control (e.g., Git)</li>
                                    <li>Basic understanding of backend technologies (optional)</li>
                                    <!-- Add more skills as needed -->
                                </ul>
                                <h6 class="card-subtitle">Salary Expectations:</h6>
                                <p class="card-text">Average salary: $60,000 - $100,000 per year, depending on experience
                                    and location.</p>
                                <h6 class="card-subtitle">Career Path:</h6>
                                <p class="card-text">Junior Developer → Web Developer → Senior Developer → Technical
                                    Lead/Manager</p>
                                <!-- Add more details about the career -->
                                <button class="contact-button mt-3">Contact an Expert</button>
                            </div>
                        </div>
                    </div>
                    <!-- Digital Marketing Tab -->
                    <div class="tab-pane fade" id="digitalMarketing" role="tabpanel" aria-labelledby="digitalMarketing-tab">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Digital Marketing</h5>
                                <h6 class="card-subtitle">Overview:</h6>
                                <p class="card-text">Digital marketing involves promoting products or services using digital
                                    channels such as social media, email, search engines, and websites. It includes various
                                    strategies such as SEO, content marketing, email marketing, social media advertising,
                                    and PPC campaigns.</p>
                                <h6 class="card-subtitle">Skills Required:</h6>
                                <ul class="card-text list-unstyled">
                                    <li>SEO (Search Engine Optimization)</li>
                                    <li>SEM (Search Engine Marketing)</li>
                                    <li>Social media management and advertising</li>
                                    <li>Email marketing</li>
                                    <li>Content creation and marketing</li>
                                    <li>Google Analytics and other analytics tools</li>
                                    <!-- Add more skills as needed -->
                                </ul>
                                <h6 class="card-subtitle">Salary Expectations:</h6>
                                <p class="card-text">Average salary: $50,000 - $90,000 per year, depending on experience and
                                    location.</p>
                                <h6 class="card-subtitle">Career Path:</h6>
                                <p class="card-text">Digital Marketing Assistant → Digital Marketing Specialist → Digital
                                    Marketing Manager → Digital Marketing Director</p>
                                <!-- Add more details about the career -->
                                <button class="contact-button mt-3">Contact an Expert</button>
                            </div>
                        </div>
                    </div>
                    <!-- Data Analysis using Excel Tab -->
                    <div class="tab-pane fade" id="dataAnalysis" role="tabpanel" aria-labelledby="dataAnalysis-tab">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Data Analysis using Excel</h5>
                                <h6 class="card-subtitle">Overview:</h6>
                                <p class="card-text">Data analysis using Excel involves analyzing and visualizing data to
                                    extract insights and make informed decisions. It includes tasks such as data cleaning,
                                    manipulation, visualization, and basic statistical analysis.</p>
                                <h6 class="card-subtitle">Skills Required:</h6>
                                <ul class="card-text list-unstyled">
                                    <li>Data visualization techniques</li>
                                    <li>Pivot tables and charts</li>
                                    <li>Advanced Excel functions (e.g., VLOOKUP, INDEX-MATCH)</li>
                                    <li>Basic understanding of statistics</li>
                                    <li>Data cleaning and preprocessing</li>
                                    <li>Experience with Excel add-ins or plugins (e.g., Power Query, Power Pivot)</li>
                                    <!-- Add more skills as needed -->
                                </ul>
                                <h6 class="card-subtitle">Salary Expectations:</h6>
                                <p class="card-text">Average salary: $50,000 - $80,000 per year, depending on experience
                                    and location.</p>
                                <h6 class="card-subtitle">Career Path:</h6>
                                <p class="card-text">Data Analyst → Senior Data Analyst → Data Scientist → Data Science
                                    Manager</p>
                                <!-- Add more details about the career -->
                                <button class="contact-button mt-3">Contact an Expert</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




            <div class="section border-0 bg- mb-1" style="margin-top: 0px;">
                <div class="container">
                    <div class="row justify-content-center text-center mb-5">
                        <div class="col-lg-6">
                            <h3 class="display-4 fw-bolder mb-3">Featured Courses</h3>
                            <p>Ready to learn? explore our featured courses</p>
                        </div>
                    </div>
                    <div class="row">


                        @foreach ($courses as $course)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card mb-4">
                                    <img src="{{ $course->thumbnail ? asset($course->thumbnail) : '/assets/img/default-thumbnail.jpg' }}"
                                        class="card-img-top" alt="Course 1 image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $course->title }}</h5>
                                        <p class="card-text">{!! $course->short_description !!}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted">4.5 stars (123 reviews)</span>
                                            <span
                                                class="text-success">₦{{ number_format($course->discount_price ?? $course->price, 0) }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <span class="badge bg-primary">{{ $course->language }}</span>
                                            <a href="{{ route('course.detail', ['slug' => $course->slug]) }}"
                                                class="btn btn-outline-primary stretched-link">Enroll now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="clear"></div>

            <div class="container my-5">
                <div class="heading-block mw-xs mx-auto text-center mb-6">
                    <h5 class="font-body text-uppercase ls-2 color">Testimonials</h5>
                    <h3 class="text-transform-none ls-0">What Our Clients say</h3>
                </div>
                <div class="row gutter-md-50">
                    <div class="col-lg-4 px-lg-5">
                        <div class="mb-4 color">
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                        </div>
                        <h3 class="fw-semibold font-body mb-4">The most comprehensive template collection on envato.</h3>
                        <p class="op-06 fw-medium">"Completely productivate quality web services rather than standards
                            compliant niches. Continually engineer."</p>

                        <div class="d-flex align-items-center mt-4">
                            <img src="demos/finance/images/users/1.jpg" alt="User" width="60"
                                class="rounded-circle">
                            <div class="ms-3">
                                <h4 class="font-body mb-2 fw-bold h6">Alan Fresco</h4>
                                <div class="op-05 text-uppercase ls-1 text-smaller fw-semibold">Company Inc.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 px-lg-5 mt-5 mt-lg-0">
                        <div class="mb-4 color">
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                        </div>
                        <h3 class="fw-semibold font-body mb-4">Awesome Design &amp; Customer Support.</h3>
                        <p class="op-06 fw-medium">"Amazing WORK ! This guys also very fast for support. No matter Sunday
                            or Monday. I get my answers and they were really patiently with my sometimes stupid questions!"
                        </p>

                        <div class="d-flex align-items-center mt-4">
                            <img src="demos/finance/images/users/2.jpg" alt="User" width="60"
                                class="rounded-circle">
                            <div class="ms-3">
                                <h4 class="font-body mb-2 fw-bold h6">iNoize</h4>
                                <div class="op-05 text-uppercase ls-1 text-smaller fw-semibold">Company Inc.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 px-lg-5 mt-5 mt-lg-0">
                        <div class="mb-4 color">
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                        </div>
                        <h3 class="fw-semibold font-body mb-4">Flexibility and Feature Availability</h3>
                        <p class="op-06 fw-medium">"A great thing that there are many demos available otherwise all of the
                            great implementation and features would never be used or understood the right way."</p>

                        <div class="d-flex align-items-center mt-4">
                            <img src="demos/finance/images/users/3.jpg" alt="User" width="60"
                                class="rounded-circle">
                            <div class="ms-3">
                                <h4 class="font-body mb-2 fw-bold h6">Wickdevs</h4>
                                <div class="op-05 text-uppercase ls-1 text-smaller fw-semibold">Company Inc.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="promo promo-light promo-full p-5 footer-stick" style="padding: 60px 0 !important;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg">
                            <h3 class="ls-1">Call us today at <span>+1.22.57412541</span> or Email us at <span>support@canvas.com</span></h3>
                            <span class="text-black-50">We strive to provide Our Customers with Top Notch Support to make their Theme Experience Wonderful.</span>
                        </div>
                        <div class="col-12 col-lg-auto mt-4 mt-lg-0">
                            <a href="#" class="button button-xlarge button-rounded text-transform-none ls-0 fw-normal m-0">Start Now</a>
                        </div>
                    </div>
                </div>
            </div>







        </div>
    </section><!-- #content end -->

@endsection
