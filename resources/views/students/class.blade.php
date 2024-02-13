<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            background-color: #f8f9fa;
            height: 100vh;
            overflow-y: auto;
        }

        .main-content {
            padding: 20px;
        }

        .navbar-toggler-icon {
            background-color: #007bff;
        }

        @media (max-width: 767px) {
            .navbar-toggler {
                background-color: #007bff;
            }


            .sidebar {
                display: none;
            }
        }

        .lesson-item {
            font-size: 16px;
        }

        .lesson-item.active-chapter {
            font-weight: bold;
            font-size: 18px;
        }

        .lesson-list li {
            font-size: 14px;
        }

        .progress-container {
            margin-top: 15px;
        }

        .current-info {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .current-chapter {
            font-weight: bold;
        }

        .progress {
            height: 20px;
            border-radius: 5px;
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .progress-bar {
            background-color: #007bff;
        }

        .nav-tabs {
            background-color: #f8f9fa;
            border-bottom: 2px solid #007bff;
        }

        .nav-tabs .nav-item {
            margin-bottom: 0;
        }

        .nav-tabs .nav-link {
            color: #495057;
            border: 1px solid transparent;
            border-radius: 0;
        }

        .nav-tabs .nav-link:hover {
            background-color: #e9ecef;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: #ffffff;
            border-color: #007bff;
        }

        .tab-content {
            border: 1px solid #007bff;
            padding: 15px;
            border-radius: 0 0 5px 5px;
        }


        .sidebar a {
            text-decoration: none;
            color: #333;
        }


        .sidebar .locked-lesson {
            pointer-events: none;
            opacity: 0.7;
            color: #777;
        }


        .sidebar a:hover {
            text-decoration: none;
        }


        .sidebar .active-lesson {
            color: #4CAF50;
            background-color: #e6ffe6;
            padding: 5px;
        }

        .lesson-duration {
            font-size: 12px;
            color: #888;
            margin-left: 8px;
            font-weight: normal;
        }

        .lesson-icon {
            font-size: 14px;
            color: inherit;
            margin-left: 8px;
        }

        .avatar-initials {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #007bff;
            /* You can change the background color */
            color: #ffffff;
            /* You can change the text color */
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-weight: bold;
            font-size: 14px;
        }
    </style>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ $course->title }}</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Header for Mobile View -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

            <!-- Sidebar -->
            <div class="col-md-3 sidebar" id="sidebar">
                <a href="{{ route('student.courses') }}" class="btn btn-primary btn-block my-3"
                    style="background-color: #3498db; color: #fff; border: 1px solid #3498db; text-decoration: none; padding: 10px 20px; display: inline-block; border-radius: 5px; transition: background-color 0.3s;">
                    Back to Dashboard
                </a>

                <ul class="list-group">
                    @foreach ($course->chapters as $chapter)
                        <li class="list-group-item lesson-item {{ $chapter->id == $progress['current_chapter'] ? ' active-chapter' : '' }} {{ in_array($chapter->id, $progress['completed_chapters']) ? ' completed-chapter' : '' }}"
                            data-toggle="collapse" data-target="#chapter{{ $chapter->id }}"
                            aria-expanded="{{ $chapter->id == $progress['current_chapter'] ? 'true' : 'false' }}">
                            <i
                                class="fas fa-check-circle{{ $chapter->id == $progress['current_chapter'] || in_array($chapter->id, $progress['completed_chapters']) ? ' text-success' : ' text-muted' }}"></i>
                            {{ $chapter->title }}
                            <i class="fas fa-chevron-right float-right"></i>
                        </li>

                        <div id="chapter{{ $chapter->id }}"
                            class="collapse lesson-list{{ $chapter->id == $progress['current_chapter'] ? ' show' : '' }}">
                            @foreach ($chapter->contents as $content)
                                @php
                                    $lessonLocked = !in_array($content->id, $progress['completed_lessons']) && $content->id != $progress['current_lesson'];
                                @endphp

                                <a href="{{ $lessonLocked ? '#' : route('courses.lessons.showLesson', ['slug' => $course->slug, 'lessonId' => $content->id]) }}"
                                    class="{{ $lessonLocked ? 'locked-lesson' : '' }}">
                                    <li
                                        class="list-group-item{{ $content->id == $progress['current_lesson'] ? ' active-lesson' : '' }}">
                                        <i
                                            class="fas fa-check-circle{{ in_array($content->id, $progress['completed_lessons']) ? ' text-success' : ' text-muted' }}"></i>
                                        @if ($lessonLocked)
                                            <i class="fas fa-lock"></i>
                                        @endif
                                        {{ $content->title }}

                                        @if ($content->duration)
                                            <span class="lesson-duration"><i class="fas fa-tv lesson-icon"></i>
                                                {{ $content->duration }} mins</span>
                                        @endif
                                    </li>
                                </a>
                            @endforeach
                        </div>
                    @endforeach

                </ul>


            </div>

            <!-- Main Content -->
            <div class="col-md-9 main-content">
                <div class="progress-container mb-3">
                    <div class="current-info">
                        <span class="current-chapter">{{ $currentChapter->title ?? 'No Chapter' }}</span>
                        <span class="current-lesson float-right">{{ $currentLessonTitle ?? 'No Lesson' }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100">
                            20%
                        </div>
                    </div>
                    @if (session('info'))
                        <div class="alert alert-info mt-3">
                            {{ session('info') }}
                        </div>
                    @endif

                </div>


                <div class="video-player">
                    @if ($currentLesson && $currentLesson->content_type == 'lessons')
                        <!-- Video Player Code -->
                        <video id="videoPlayer" width="100%" height="auto" controls controlsList="nodownload"
                            autoplay muted>
                            <source src="{{ asset('/'.$videoUrl) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                </div>

                @if ($currentLesson && $currentLesson->content_type == 'resources')
                    <!-- Resources Section -->
                    <div class="resources">
                        <h4>Resources</h4>
                        <p>{{ $currentLesson->title }} <a href="{{ $currentLesson->content_path }}"
                                class="btn btn-primary btn-sm" download>Download</a></p>
                    </div>
                @endif

                @if ($currentLesson && $currentLesson->content_type == 'quiz')
                    <!-- Quiz Section -->
                    <div class="quiz">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $currentLesson->title }}</h5>
                                <p class="card-text">Duration: {{ $assessmentDetails->duration }} mins</p>
                                <p class="card-text">Question Number: {{ $assessmentDetails->num_questions }}</p>
                                <a href="{{ route('start.assessment', ['assessmentId' => $assessmentDetails->id]) }}"
                                    class="btn btn-danger">Start Quiz</a>
                            </div>
                        </div>
                    </div>
                @endif



                <ul class="nav nav-tabs mt-3" id="myTabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview">Overview</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="notes-tab" data-toggle="tab" href="#notes">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="forum-tab" data-toggle="tab" href="#forum">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews">Reviews</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-3">
                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="overview">
                        <div class="container mt-4">
                            <!-- Chapter Overview -->
                            {{-- <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $currentChapter->title }} Overview</h5>
                                    <div class="card-text" style="white-space: normal;">
                                        @if (isset($currentChapter))
                                            {!! $currentChapter->description !!}
                                        @else
                                            <p>No chapter selected.</p>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}

                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $currentChapter->title }} Overview</h5>
                                    {!! $currentChapter->description !!}
                                </div>
                            </div>



                            <!-- Course Overview -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Course Overview</h5>
                                    {!! $course->description !!}
                                </div>
                            </div>

                            <!-- Instructor Overview -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Instructor Overview</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="single_instructor_thumb mr-3">
                                            <img src="{{ asset($course->instructor->profile_image ? $course->instructor->profile_image : 'uploads/default.png') }}"
                                                class="img-fluid rounded-circle" alt="Instructor Avatar"
                                                style="width: 100px; height: 100px;">
                                        </div>
                                        <div class="single_instructor_caption">
                                            <h4><a href="#">{{ $course->instructor->name }}</a></h4>
                                            <p class="font-weight-bold">{{ $course->instructor->profile->profession }}
                                            </p>
                                            <p>{!! $course->instructor->profile->biography !!}</p>
                                            {{-- <ul class="social_info">
                                                <li><a href="{{ $course->instructor->profile->facebookLink ?? '#' }}"><i
                                                            class="ti-facebook"></i></a></li>
                                                <li><a href="{{ $course->instructor->profile->twitterLink ?? '#' }}"><i
                                                            class="ti-twitter"></i></a></li>
                                                <li><a href="{{ $course->instructor->profile->linkedInLink ?? '#' }}"><i
                                                            class="ti-linkedin"></i></a></li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- notes --}}
                    <div class="tab-pane fade" id="notes">
                        <h4>Notes</h4>
                        <div id="notesLoader" class="spinner-border text-primary" role="status"
                            style="display: none;">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div id="notesContainer"></div>
                    </div>


                    {{-- forum --}}
                    <div class="tab-pane fade" id="forum">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form id="discussionForm">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <div class="mb-3">
                                        <label for="discussionContent">Your Discussion:</label>
                                        <textarea class="form-control" id="discussionContent" name="content" rows="2" required></textarea>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="submitDiscussionBtn"
                                        onclick="submitDiscussionForm()">Post Discussion</button>
                                </form>
                            </div>
                        </div>

                        <div id="discussionContainer"></div>
                    </div>


                    <style>
                        .selected {
                            color: gold;
                        }
                    </style>


                    {{-- <div class="tab-pane fade" id="reviews">
                        <!-- Display existing reviews -->
                        <div class="existing-reviews">
                            <!-- Sample reviews -->
                        </div>
                        <!-- Button to add a new review -->
                        <button class="btn btn-primary" id="add-review-btn" data-toggle="modal"
                            data-target="#reviewModal">Add Your Review</button>
                    </div> --}}


                    <div class="tab-pane fade" id="reviews">
                        <button class="btn btn-primary mb-2 pull-right" id="add-review-btn" data-toggle="modal" data-target="#reviewModal">Add Your Review</button>

                        <div class="existing-reviews">
                            <!-- Container to append fetched reviews -->
                            <div id="reviewContainer"></div>
                            <!-- Button to load more reviews -->
                            <button class="btn btn-primary mt-3" id="loadMoreReviews">Show More</button>
                        </div>
                        <!-- Button to add a new review -->
                    </div>
                    


                </div>



                <!-- Add Note Modal -->
                <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog"
                    aria-labelledby="addNoteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-slide-right modal-bottom" role="document">
                        <div class="modal-content" style="background-color: #f8f9fa; border: 2px solid #007bff;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addNoteModalLabel">Add Note</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Note content input -->
                                <textarea id="noteContent" class="form-control" rows="10" placeholder="Write your note here..."></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveNoteBtn"
                                    onclick="saveNote()">Save Note</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review submission modal -->
                <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog"
                    aria-labelledby="reviewModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="reviewModalLabel">Write Your Review</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Star rating -->
                                <div class="star-rating">
                                    <span class="star" data-index="0">&#9733;</span>
                                    <span class="star" data-index="1">&#9733;</span>
                                    <span class="star" data-index="2">&#9733;</span>
                                    <span class="star" data-index="3">&#9733;</span>
                                    <span class="star" data-index="4">&#9733;</span>
                                </div>
                                <!-- Review text input -->
                                <div class="form-group">
                                    <label for="reviewText">Write Your Review (Optional)</label>
                                    <textarea class="form-control" id="reviewText" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="submitReview">Submit
                                    Review</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Floating Buttons -->
    <div class="fixed-bottom mb-3 mr-3">
        <div class="btn-group float-right" role="group">
            <a href="{{ route('course.next.lesson', ['slug' => $course->slug]) }}" class="btn btn-primary"
                id="nextLessonBtn">
                <i class="fas fa-arrow-right"></i> Next Lesson
            </a>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addNoteModal">
                <i class="fas fa-edit"></i> Add Note
            </button>
        </div>

        <div class="btn-group float-left" role="group">
            <button type="button" class="btn btn-light"><i class="fas fa-thumbs-up"></i></button>
            <button type="button" class="btn btn-light"><i class="fas fa-thumbs-down"></i></button>
        </div>
    </div>

    <input type="hidden" id="currentChapterId" value="{{ $progress['current_chapter'] }}">
    <input type="hidden" id="currentLessonId" value="{{ $progress['current_lesson'] }}">

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Add this to the head section of your HTML file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
      $(document).ready(function() {
    // Global variables to track offset and limit
    var offset = 0;
    var limit = 2;

    // Function to fetch reviews
    function fetchReviews() {
        $.ajax({
            url: '{{ route('fetch-reviews') }}',
            method: 'GET',
            data: {
                offset: offset,
                limit: limit
            },
            beforeSend: function() {
                // Show spinner loader while reviews are loading
                $('#reviewContainer').append('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
            },
            success: function(response) {
                // Remove the spinner loader
                $('#reviewContainer .fa-spinner').parent().remove();

                // Append fetched reviews to the container
                $.each(response.reviews, function(index, review) {
                    var starRating = '';
                    // Create star rating HTML based on the rating count
                    for (var i = 1; i <= review.rating; i++) {
                        starRating += '<span class="star' + (i <= review.rating ? ' filled' : '') + '">&#9733;</span>';
                    }

                    // Handle user's image
                    var userImage = review.user_picture ? review.user_picture : getInitials(review.user_name);

                    // Append review item as a card
                    var reviewItem = '<div class="card mb-3">' +
                                        '<div class="card-body">' +
                                            '<div class="user-info">' +
                                                '<img src="' + userImage + '" alt="' + review.user_name + '" class="user-picture">' +
                                                '<span class="user-name">' + review.user_name + '</span>' +
                                            '</div>' +
                                            '<div class="star-rating">' + starRating + '</div>' +
                                            '<div class="review-content">' + review.content + '</div>' +
                                        '</div>' +
                                    '</div>';
                    $('#reviewContainer').append(reviewItem);
                });

                // Increment offset for the next fetch
                offset += limit;

                // If there are no more reviews, hide the "Show More" button
                if (response.reviews.length < limit) {
                    $('#loadMoreReviews').hide();
                }
            },
            error: function(xhr, status, error) {
                console.error(error); // Log any errors
                // Show error message if reviews could not be fetched
                $('#reviewContainer').append('<div class="text-danger">Failed to load reviews. Please try again later.</div>');
            }
        });
    }

    // Load initial reviews when tab is switched to
    $('#reviews-tab').click(function() {
        fetchReviews();
    });

    function getInitials(name) {
    if (!name) return ''; // Check if name is null or undefined
    return name.split(' ').map(function(word) {
        return word.charAt(0).toUpperCase();
    }).join('');
}

    // Load more reviews when "Show More" button is clicked
    $(document).on('click', '#loadMoreReviews', function() {
        fetchReviews();
    });
});

    </script>
    
    
    
    



    <!-- submit reviws -->
    <script>
        $(document).ready(function() {
            // Add event listener to stars
            $('.star').click(function() {
                var selectedIndex = parseInt($(this).attr('data-index'));
                $('.star').each(function(index) {
                    if (index <= selectedIndex) {
                        $(this).addClass('selected');
                    } else {
                        $(this).removeClass('selected');
                    }
                });
            }).hover(function() {
                $(this).css('cursor', 'pointer');
            });

            // Add event listener to submit button
            $('#submitReview').click(function() {
                var starRating = $('.selected').length;
                var reviewText = $('#reviewText').val();
                var courseId = $('[name="course_id"]').val();

                $(this).prop('disabled', true);
                // Show loading spinner
                $(this).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...'
                );

                var data = {
                    rating: starRating,
                    review: reviewText,
                    course_id: courseId,
                    _token: '{{ csrf_token() }}' // Include the CSRF token
                };
                // Ajax submission
                $.ajax({
                    url: '{{ route('submit-review') }}',
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        console.log(response); // Log the server response
                        // Close modal
                        $('#reviewModal').modal('hide');
                        toastr.success('Review submitted successfully. Thank you!');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Check if the response contains validation errors
                        if (xhr.responseJSON && xhr.responseJSON.errors && xhr.responseJSON
                            .errors.rating) {
                            // Extract the validation error message for the 'rating' field
                            var errorMessage = xhr.responseJSON.errors.rating[0];
                            // Show the error message
                            toastr.error(errorMessage);
                        } else {
                            // Show a generic error message
                            toastr.error('Failed to submit review. Please try again.');
                        }
                    },
                    complete: function() {
                        // Re-enable the submit button
                        $('#submitReview').prop('disabled', false);
                        // Reset button text to original
                        $('#submitReview').html('Submit Review');
                    }
                });
            });
        });
    </script>



    <script>
        $(document).ready(function() {
            // Parse the progress JSON
            var progress = JSON.parse('{!! addslashes(json_encode($progress)) !!}');

            // Expand the current chapter
            $('#chapter' + progress.current_chapter).addClass('show');

            // If there's a current lesson, expand it too
            if (progress.current_lesson) {
                $('#chapter' + progress.current_chapter + ' .list-group-item.active-lesson').addClass(
                    'active-lesson');
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Toggle icons for active chapters
            $('.lesson-item.active-chapter').find('.fa-chevron-right').toggleClass(
                'fa-chevron-right fa-chevron-down');

            // Toggle icons and lesson list on chapter click
            $('.lesson-item').click(function() {
                if ($(this).hasClass('active-chapter')) {
                    $(this).find('.fa-chevron-right, .fa-chevron-down').toggleClass(
                        'fa-chevron-right fa-chevron-down');
                    $(this).find('.lesson-list').toggleClass('show');
                } else {
                    // Reset icons for previously active chapter
                    $('.lesson-item.active-chapter').find('.fa-chevron-down').toggleClass(
                        'fa-chevron-right fa-chevron-down');
                    $('.lesson-item.active-chapter').removeClass('active-chapter');

                    // Set icons for the clicked chapter
                    $(this).addClass('active-chapter');
                    $(this).find('.fa-chevron-right').toggleClass('fa-chevron-right fa-chevron-down');
                    $(this).find('.lesson-list').toggleClass('show');
                }
            });

            // Toggle sidebar on mobile view
            $('.navbar-toggler').click(function() {
                $('.sidebar').toggle();
            });
        });
    </script>

    {{-- <script src="https://cdn.tiny.cloud/1/k9osr3m8tz88vazuys0nr7q1fytr8gnfem7ho34o6h90d62d/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script> --}}

    <script>
        tinymce.init({
            selector: '#noteContent',
            height: 400,
            plugins: 'lists link',
            toolbar: 'undo redo | formatselect | bold italic underline | numlist bullist | link',
            menubar: false,
            branding: false,
        });
    </script>

    {{-- save note --}}
    <script>
        function saveNote() {
            // Get the note content
            var noteContent = tinymce.get('noteContent').getContent().trim();

            // Check if the content is empty
            if (noteContent === '') {
                toastr.warning('Note content cannot be empty.');
                return;
            }

            // Get the current chapter and lesson IDs
            var currentChapterId = $('#currentChapterId').val();
            var currentLessonId = $('#currentLessonId').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Disable the button and show a spinner
            $('#saveNoteBtn').prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');

            // Make Ajax request to save the note
            $.ajax({
                type: 'POST',
                url: '{{ route('save-note') }}',
                data: {
                    _token: csrfToken,
                    content: noteContent,
                    chapterId: currentChapterId,
                    lessonId: currentLessonId,
                },
                success: function(response) {
                    fetchAndDisplayNotes();
                    $('#addNoteModal').modal('hide');

                    toastr.success('Note saved successfully');

                    $('#saveNoteBtn').prop('disabled', false).html('Save Note');

                },
                error: function(error) {
                    console.error('Error saving note:', error);

                    toastr.error('Error saving note. Please try again.');

                    $('#saveNoteBtn').prop('disabled', false).html('Save Note');

                }
            });
        }
    </script>

    {{-- fetch notes --}}

    <script>
        // Fetch and display notes on tab click
        $('#notes-tab').on('click', function() {
            fetchAndDisplayNotes();
        });

        function fetchAndDisplayNotes() {
            var currentChapterId = $('#currentChapterId').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Show loader
            $('#notesLoader').show();

            $.ajax({
                type: 'GET',
                url: '{{ route('fetch-notes') }}',
                data: {
                    _token: csrfToken,
                    chapterId: currentChapterId,
                },
                success: function(response) {
                    var lessonsWithNotes = response.lessonsWithNotes;
                    var currentLessonId = response.currentLessonId;

                    // Assuming you have a container with ID 'notesContainer'
                    var notesContainer = $('#notesContainer');
                    notesContainer.empty(); // Clear previous notes

                    lessonsWithNotes.forEach(function(lesson) {
                        var lessonClass = lesson.id == currentLessonId ? 'current-lesson' : '';

                        // Append lesson title and notes to the container
                        notesContainer.append('<div class="lesson ' + lessonClass + '">' +
                            '<h5>' + lesson.title + '</h5>' +
                            '<table class="table">' +
                            '<thead>' +
                            '<tr>' +
                            '<th>Note</th>' +
                            '<th>Action</th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody>' +
                            getNotesHTML(lesson.notes) +
                            '</tbody>' +
                            '</table>' +
                            '</div>');
                    });

                    // Hide loader on success
                    $('#notesLoader').hide();

                    // Attach click handlers for view and delete buttons
                    attachButtonHandlers();
                },
                error: function(error) {
                    console.error('Error fetching notes:', error);

                    // Hide loader on error
                    $('#notesLoader').hide();
                }
            });
        }

        // Function to generate HTML for notes table
        function getNotesHTML(notes) {
            var notesHTML = '';
            notes.forEach(function(note) {
                var truncatedContent = note.content.length > 100 ? note.content.substring(0, 100) + '...' : note
                    .content;

                notesHTML += '<tr>' +
                    '<td>' + truncatedContent + '</td>' +
                    '<td>' +
                    '<button class="btn btn-primary view-note" data-note-content="' + note.content +
                    '"><i class="fa fa-eye"></i></button>' +
                    '<button class="btn btn-danger delete-note" data-note-id="' + note.id +
                    '"><i class="fa fa-trash"></i></button>' +
                    '</td>' +
                    '</tr>';
            });
            return notesHTML;
        }

        function attachButtonHandlers() {

            $('#notesContainer').on('click', '.view-note', function() {
                var noteContent = $(this).data('note-content');

                console.log('Note Content:', noteContent);

                var editor = tinymce.get('noteContent');

                if (editor) {
                    editor.setContent(noteContent);
                }
                $('#addNoteModal').modal('show');
            });

            $('#notesContainer').on('click', '.delete-note', function() {
                var noteId = $(this).data('note-id');
                var confirmation = confirm('Are you sure you want to delete this note?');

                if (confirmation) {
                    deleteNoteAction(noteId);
                }
            });
        }



        function deleteNoteAction(noteId) {
            // AJAX request to delete the note
            $.ajax({
                type: 'DELETE',
                url: '{{ route('delete-note') }}',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    noteId: noteId,
                },
                success: function(response) {
                    fetchAndDisplayNotes();
                    toastr.success('Note deleted successfully')
                },
                error: function(error) {
                    console.error('Error deleting note:', error);
                }
            });
        }
    </script>


    <script>
        function submitDiscussionForm() {
            var form = $('#discussionForm');
            var submitBtn = $('#submitDiscussionBtn');

            // Show spinner inside the submit button
            submitBtn.html('<i class="fa fa-spinner fa-spin"></i> Posting...');

            $.ajax({
                type: 'POST',
                url: '{{ route('discussions.store') }}',
                data: form.serialize(),
                success: function(response) {
                    // Handle success, e.g., show a success message
                    console.log(response);
                    form[0].reset(); // Clear the form
                    loadDiscussions(); // Reload discussions after posting

                    // Hide spinner after submission
                    submitBtn.html('Submit Discussion');

                    // Display success message
                    toastr.success('Discussion submitted successfully.');
                },
                error: function(error) {
                    // Handle errors, e.g., show an error message
                    console.error(error);

                    // Hide spinner after submission
                    submitBtn.html('Post Discussion');

                    // Check if the error response contains validation errors
                    if (error.responseJSON && error.responseJSON.errors) {
                        var validationErrors = error.responseJSON.errors;

                        // Display validation errors using Toastr
                        for (var field in validationErrors) {
                            toastr.error(validationErrors[field][0]);
                        }
                    } else {
                        // Display a generic error message
                        toastr.error('Error submitting discussion. Please try again.');
                    }
                }
            });
        }


        function loadDiscussions() {
            // Fetch and display discussions using AJAX
            $.ajax({
                type: 'GET',
                url: '{{ route('discussions.index', ['course_id' => $course->id]) }}',
                success: function(response) {
                    // Clear existing discussions before appending new ones
                    $('#discussionContainer').empty();

                    // Assuming you have the currently logged-in user's information
                    var loggedInUserInitials = "{{ auth()->user()->name }}".split(' ').map(function(word) {
                        return word.charAt(0);
                    }).join('');

                    // Iterate through discussions
                    response.discussions.forEach(function(discussion) {
                        // Extract initials from the user's name
                        var authorInitials = discussion.user.name.split(' ').map(function(word) {
                            return word.charAt(0);
                        }).join('');

                        // Format the date (shorter format without time)
                        var formattedDate = new Date(discussion.created_at).toLocaleDateString(
                            'en-US', {
                                year: 'numeric',
                                month: 'short',
                                day: 'numeric'
                            });

                        // Build HTML for each discussion post
                        var discussionHtml = `
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="rounded-circle avatar-initials">
                                <span>${authorInitials}</span>
                            </div>
                            <span class="ms-2">${discussion.user.name}</span>
                            <small class="text-muted ms-2">${formattedDate}</small>
                            <p class="mt-3">${discussion.content}</p>
                            <div class="input-group mb-3">
                                <div class="rounded-circle avatar-initials">
                                    <span>${loggedInUserInitials}</span>
                                </div>
                                <input type="text" class="form-control styled-text-input" id="commentInput_${discussion.id}" placeholder="Enter your comment">
                                <button class="btn btn-outline-secondary" type="button" onclick="submitComment(${discussion.id})">Post</button>
                            </div>
                            <a href="#" class="card-link" data-toggle="collapse" data-target="#commentsCollapse_${discussion.id}">Show ${discussion.comments.length} comments</a>
                            
                            <div class="collapse" id="commentsCollapse_${discussion.id}">
                                <!-- Comments container -->
                                <div class="mt-3">
                                    <!-- Iterate through comments and display them -->
                                    ${discussion.comments.map(comment => {
                                        // Function to get initials from user's name
                                        const getInitials = (name) => name.split(' ').map(word => word.charAt(0)).join('');

                                        return `
                                                    <div class="d-flex">
                                                        <div class="rounded-circle avatar-initials me-2">
                                                            <span>${comment.user ? getInitials(comment.user.name) : 'N/A'}</span>
                                                        </div>
                                                        <p class="mb-0">
                                                            <strong>${comment.user ? comment.user.name : 'Unknown User'}</strong>: ${comment.content}
                                                        </p>
                                                    </div>
                                                `;
                                    }).join('')}
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                        // Append discussion post to the container
                        $('#discussionContainer').append(discussionHtml);
                    });
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        function submitComment(discussionId) {
            var commentInput = $('#commentInput_' + discussionId);
            var content = commentInput.val();

            // Check if the comment is not empty
            if (content.trim() === '') {
                alert('Please enter a comment.');
                return;
            }
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Send AJAX request to create a comment
            $.ajax({
                type: 'POST',
                url: '{{ route('comments.store') }}',
                data: {
                    _token: csrfToken,
                    discussion_id: discussionId,
                    content: content,
                    // Add any additional parameters if needed
                },
                success: function(response) {
                    // Handle success, e.g., show a success message
                    console.log(response);
                    commentInput.val(''); // Clear the comment input
                    loadDiscussions(); // Reload discussions after posting
                    toastr.success('Comment posted successfully.');
                },
                error: function(error) {
                    // Handle errors, e.g., show an error message
                    console.error(error);
                    toastr.error('Error posting comment. Please try again.');
                }
            });
        }
        // Load discussions when the page loads
        $(document).ready(function() {
            loadDiscussions();
        });
    </script>


</body>

</html>
