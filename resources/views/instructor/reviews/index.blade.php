@extends('layouts.app')
@section('pageTitle', 'Course Review')

@section('content')
    <section id="content" style="margin-top: -40px;">
        <div class="content-wrap">
            <div class="container">

                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('instructor.reviews.index') }}" method="get"
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
                                <button type="submit" class="btn btn-primary">View Reviews</button>
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


                    @if ($courseReviews)
                        <div class="card-body">
                            <h5>Course Reviews for {{ $selectedCourse->title }}</h5>
                            @foreach ($courseReviews as $review)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="user-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rounded-circle avatar-initials">
                                                        <span>{{ getInitials($review->user->name) }}</span>
                                                    </div>
                                                    <span class="user-name">{{ $review->user->name }}</span>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn" type="button"
                                                        id="dropdownMenuButton_{{ $review->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical text-dark"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dropdownMenuButton_{{ $review->id }}">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('reviews.toggle-publish', $review->id) }}">
                                                                @if ($review->published)
                                                                    Unpublish
                                                                @else
                                                                    Publish
                                                                @endif
                                                            </a>
                                                        </li>                                                        
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="star-rating">
                                            <!-- Display star ratings -->
                                            @for ($i = 1; $i <= $review->rating; $i++)
                                                <span class="star filled">&#9733;</span>
                                            @endfor
                                        </div>
                                        <div class="review-content">
                                            <!-- Display review text -->
                                            {{ $review->review }}
                                            @if ($review->published)
                                                <br/><span class="badge bg-success">Published</span>
                                            @else
                                            <br/><span class="badge bg-secondary">Unpublished</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-center mt-1" id="pagination-container">
                                {{ $courseReviews->appends(['course_slug' => $selectedCourse->slug])->links() }}
                            </div>
                        </div>
                    @endif
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
