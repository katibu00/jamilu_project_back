@extends('layouts.app')
@section('pageTitle', 'Course Details')
@section('content')

    <style>
        .play-video i {
            display: block;
            width: 60px;
            height: 60px;
            line-height: 61px;
            border-radius: 50%;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.85);
            text-align: center;
            font-size: 24px;
            color: #111;
            transition: all .3s ease;
            box-shadow: 0 0 1px 15px rgba(255, 255, 255, .1);
            -webkit-backface-visibility: hidden;
        }

        .play-video i.icon-small {
            width: 40px;
            height: 40px;
            line-height: 41px;
            font-size: 16px;
            box-shadow: 0 0 1px 10px rgba(255, 255, 255, .1);
        }

        .play-video:hover i {
            -webkit-transform: scale(1.2);
            -ms-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
            background-color: #FFF;
        }
    </style>

<section id="content" style="margin-top: -40px;">
    <div class="content-wrap">
        <div class="container">

        <div class="row">
            <div class="col-lg-8">
                <!-- Main Content -->
                <div class="card mb-4">
                    <!-- Featured Image -->
                    <img src="/{{ $course->thumbnail }}" class="card-img-top" alt="Course Image" style="max-height: 300px; width: 100%; height: auto;">
                    <!-- Course Title -->
                    <div class="card-body">
                        <h1 class="card-title">{{ $course->title }}</h1>
                    </div>
                </div>
                <!-- Tabs -->
                <ul class="nav canvas-alt-tabs2 tabs nav-pills mb-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview" type="button"
                            role="tab" aria-controls="overview" aria-selected="true">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#curriculum" type="button"
                            role="tab" aria-controls="curriculum" aria-selected="false">Curriculum</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#instructor" type="button"
                            role="tab" aria-controls="instructor" aria-selected="false">Instructor</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab"
                            aria-controls="review" aria-selected="false">Review</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="courseTabsContent">
                    <!-- Overview -->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="card-body">
                            <span class="card-text">{!! $course->description !!}</span>
                        </div>
                    </div>
                    <!-- Curriculum -->
                    <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                        <div class="card-body">
                            <h2 class="card-title">Course Curriculum</h2>
                            <!-- Accordion -->
                            <div class="accordion" id="courseAccordion">
                                @foreach ($course->chapters as $key => $chapter)
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="heading{{ $chapter->id }}">
                                            <button class="accordion-button {{ $key === 0 ? 'collapsed' : '' }}"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $chapter->id }}"
                                                aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                                aria-controls="collapse{{ $chapter->id }}">
                                                <strong class="d-inline-block w-75">{{ $chapter->title }}</strong>
                                            </button>
                                        </h3>
                                        <div id="collapse{{ $chapter->id }}"
                                            class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
                                            aria-labelledby="heading{{ $chapter->id }}" data-bs-parent="#courseAccordion">
                                            <div class="accordion-body">
                                                <ul class="list-group list-group-flush">
                                                    @foreach ($chapter->contents as $content)
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                            <span class="w-75">
                                                                @if ($content->content_type === 'lessons')
                                                                    <i class="fas fa-book-open me-2"></i>
                                                                    <!-- Lesson Icon -->
                                                                @elseif ($content->content_type === 'quiz')
                                                                    <i class="fas fa-pen me-2"></i> <!-- Quiz Icon -->
                                                                @elseif ($content->content_type === 'resources')
                                                                    <i class="fas fa-link me-2"></i> <!-- Resources Icon -->
                                                                @endif
                                                                {{ $content->title }}
                                                            </span>
                                                            @if ($content->content_type === 'lessons')
                                                                <span
                                                                    class="badge bg-primary rounded-pill float-right">{{ $content->duration }}</span>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Instructor -->
                    <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                        <div class="card-body">
                            <h2 class="card-title">Meet Your Instructor</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Instructor Image -->
                                    <img src="instructor-image.jpg" class="img-fluid rounded-circle" alt="Instructor Image">
                                </div>
                                <div class="col-md-8">
                                    <!-- Instructor Name -->
                                    <h3 class="card-subtitle mb-3">John Doe</h3>
                                    <!-- Instructor Bio -->
                                    <p class="card-text">John Doe is a web developer and instructor with over 10 years of
                                        experience. He has taught thousands of students online and offline, and helped them
                                        achieve their web development goals. He is passionate about sharing his knowledge
                                        and skills with others, and making web development fun and easy to learn. He
                                        specializes in front-end development, using HTML, CSS, JavaScript, and Bootstrap. He
                                        also has experience in back-end development, using PHP, MySQL, and Laravel.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Review -->
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="card-body">
                            <h2 class="card-title">What Students Say</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Review 1 -->
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <!-- Reviewer Image -->
                                                <img src="reviewer-1-image.jpg" class="img-fluid rounded-circle me-3"
                                                    alt="Reviewer 1 Image" width="50" height="50">
                                                <!-- Reviewer Name -->
                                                <h4 class="card-subtitle">Jane Smith</h4>
                                            </div>
                                            <!-- Review Rating -->
                                            <div class="mb-3">
                                                <span class="text-warning">★ ★ ★ ★ ★</span>
                                            </div>
                                            <!-- Review Text -->
                                            <p class="card-text">This course is amazing! I learned so much about Bootstrap
                                                5 and how to use it to create beautiful websites. The instructor is very
                                                clear and engaging, and the project is very fun and practical. I highly
                                                recommend this course to anyone who wants to learn Bootstrap 5.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Review 2 -->
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <!-- Reviewer Image -->
                                                <img src="reviewer-2-image.jpg" class="img-fluid rounded-circle me-3"
                                                    alt="Reviewer 2 Image" width="50" height="50">
                                                <!-- Reviewer Name -->
                                                <h4 class="card-subtitle">Jack Jones</h4>
                                            </div>
                                            <!-- Review Rating -->
                                            <div class="mb-3">
                                                <span class="text-warning">★ ★ ★ ★ ☆</span>
                                            </div>
                                            <!-- Review Text -->
                                            <p class="card-text">This course is very informative and useful. I learned a
                                                lot of new things about Bootstrap 5 and how to apply them to my own
                                                projects. The instructor is very knowledgeable and helpful, and the project
                                                is very realistic and challenging. I enjoyed this course and would recommend
                                                it to anyone who wants to learn Bootstrap 5.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Right Bar -->
                <div class="card">
                    <div class="card-body">
                        <!-- Featured Video -->
                        <div class="embed-responsive embed-responsive-16by9 mb-4">
                            {{-- <img src="/{{ $course->thumbnail }}" class="card-img-top embed-responsive-item" alt="Course Video"> --}}
                            <a href="https://www.youtube.com/watch?v=hc7iuc5KZ8Y"
                                class="magnific-popup shadow-sm d-flex align-items-center justify-content-center play-video rounded position-relative bg-color bg-color-shadow left"
                                data-effect="mfp-iframe"
                                style="background: url('/{{ $course->thumbnail }}') no-repeat center center / cover; height: 140px">
                                <i class="bi-play icon-small"></i>
                            </a>

                            <!-- Play Icon -->
                            <div class="play-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="white"
                                    class="bi bi-play-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                </svg>
                            </div>
                        </div>
                        <!-- Course Price -->
                        <div class="d-flex align-items-center mb-4">
                            <!-- Discounted Price -->
                            <h2 class="card-title me-3">$19.99</h2>
                            <!-- Original Price -->
                            <h4 class="card-subtitle text-muted text-decoration-line-through">$49.99</h4>
                        </div>
                        <!-- Course Details -->
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <!-- Number of Lessons -->
                                <span><i class="fas fa-book-open me-2"></i> Lessons</span>
                                <span class="badge bg-primary rounded-pill">8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <!-- Number of Quizzes -->
                                <span><i class="fas fa-pen me-2"></i> Quizzes</span>
                                <span class="badge bg-primary rounded-pill">4</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <!-- Number of Students -->
                                <span><i class="fas fa-users me-2"></i> Students</span>
                                <span class="badge bg-primary rounded-pill">123</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <!-- Skill Level -->
                                <span><i class="fas fa-graduation-cap me-2"></i> Skill Level</span>
                                <span class="badge bg-primary rounded-pill">Intermediate</span>
                            </li>
                        </ul>
                        
                        <!-- Enroll Now Button -->
                        <a href="{{ route('course.buy', ['slug' => $course->slug]) }}" class="btn btn-primary btn-lg w-100">Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('js')

    <!-- Initialize Magnific Popup -->
    <script>
        $(document).ready(function() {
            $('.magnific-popup').magnificPopup({
                type: 'iframe'
                // Add any additional options you need
            });
        });
    </script>
@endsection
