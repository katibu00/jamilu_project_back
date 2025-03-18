@extends('layouts.app')
@section('pageTitle', 'Discussion Forum')

@section('content')
    <section id="content" style="margin-top: -40px;">
        <div class="content-wrap">
            <div class="container">

                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('instructor.discussions.index') }}" method="get"
                            class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="courseSelect" class="col-form-label">Select Course:</label>
                            </div>
                            <div class="col-auto">
                                <select class="form-select" id="courseSelect" name="course_slug">
                                    <option value="">Select a course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->slug }}"
                                            @if ($selectedCourse && $selectedCourse->slug == $course->slug) selected @endif>{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">View Discussions</button>
                            </div>
                        </form>
                    </div>
                    <style>
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
                    @if (session('success'))
                    <div class="alert alert-success my-2">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        @if ($discussions)

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

                            @foreach ($discussions as $discussion)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="rounded-circle avatar-initials">
                                            <span>{{ getInitials($discussion->user->name) }}</span>
                                        </div>
                                        <span class="ms-2">{{ $discussion->user->name }}</span>
                                        <small class="text-muted ms-2">{{ $discussion->created_at->format('M d, Y') }}</small>
                                    </div>
                                    <!-- Menu icon -->
                                    <div class="dropdown">
                                        <button class="btn" type="button" id="dropdownMenuButton_{{ $discussion->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical text-dark"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton_{{ $discussion->id }}">
                                            <li><a class="dropdown-item" href="{{ route('discussions.delete', $discussion->id) }}">Delete</a></li>
                                            {{-- <li><a class="dropdown-item" href="#">Fix to Top</a></li> --}}
                                        </ul>
                                    </div>
                                    
                                    </div>
                                    <!-- Discussion content -->
                                    <p class="mt-3">{{ $discussion->content }}</p>
                                    
                                    <!-- Comment input -->
                                    <div class="input-group mb-3">
                                        <div class="rounded-circle avatar-initials">
                                            <span>{{ getInitials($discussion->user->name) }}</span>
                                        </div>
                                        <input type="text" class="form-control styled-text-input" id="commentInput_{{ $discussion->id }}" placeholder="Enter your comment">
                                        <button class="btn btn-outline-secondary" type="button" onclick="submitComment({{ $discussion->id }})">Post</button>
                                    </div>
                        
                                    <!-- Comments section -->
                                    <a href="#" class="card-link" data-bs-toggle="collapse" data-bs-target="#commentsCollapse_{{ $discussion->id }}">Show {{ count($discussion->comments) }} comments</a>
                                    <div class="collapse" id="commentsCollapse_{{ $discussion->id }}">
                                        <div class="mt-3">
                                            @foreach ($discussion->comments as $comment)
                                                <div class="d-flex mb-1">
                                                    <div class="rounded-circle avatar-initials me-2">
                                                        <span>{{ getInitials($comment->user->name) }}</span>
                                                    </div>
                                                    <p class="mb-0">
                                                        <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        
                            <div class="d-flex justify-content-center mt-1" id="pagination-container">
                                {{ $discussions->appends(['course_slug' => $selectedCourse->slug])->links() }}
                            </div>
                        @endif
                    </div>
                    @php
                        function getInitials($name)
                        {
                            return implode(
                                '',
                                array_map(function ($word) {
                                    return $word[0];
                                }, explode(' ', $name)),
                            );
                        }
                    @endphp
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

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
                    form[0].reset();
                    submitBtn.html('Submit Discussion');
                    toastr.success('Discussion submitted successfully.');
                    location.reload();

                },
                error: function(error) {
                    console.error(error);
                    submitBtn.html('Post Discussion');

                    if (error.responseJSON && error.responseJSON.errors) {
                        var validationErrors = error.responseJSON.errors;

                        for (var field in validationErrors) {
                            toastr.error(validationErrors[field][0]);
                        }
                    } else {
                        toastr.error('Error submitting discussion. Please try again.');
                    }
                }
            });
        }
        function submitComment(discussionId) {
            var commentInput = $('#commentInput_' + discussionId);
            var content = commentInput.val();

            if (content.trim() === '') {
                alert('Please enter a comment.');
                return;
            }
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: '{{ route('comments.store') }}',
                data: {
                    _token: csrfToken,
                    discussion_id: discussionId,
                    content: content,
                },
                success: function(response) {
                    commentInput.val(''); 
                    toastr.success('Comment posted successfully.');
                    location.reload();
                },
                error: function(error) {
                    console.error(error);
                    toastr.error('Error posting comment. Please try again.');
                }
            });
        }
    </script>
@endsection
