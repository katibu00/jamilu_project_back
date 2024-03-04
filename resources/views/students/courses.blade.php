@extends('layouts.app')
@section('pageTitle', 'My Courses')
@section('content')
    <section id="content" style="margin-top: -40px;">
        <div class="content-wrap">
            <div class="container">
                @if ($courses->isEmpty())
                    <div class="alert alert-info" role="alert">
                        You are not enrolled in any courses. <a href="{{ route('homepage') }}" class="alert-link">Explore our
                            courses</a>.
                    </div>
                @else
                    <div class="row">
                        @foreach ($courses as $course)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <img class="card-img-top" height="300" src="/{{ $course->thumbnail }}"
                                        alt="{{ $course->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $course->title }}</h5>
                                        @if ($course->pivot->progress)
                                            @php
                                                $progress = json_decode($course->pivot->progress, true);
                                                $chapterId = $progress['current_chapter'] ?? 1;
                                                // Fetch the title of the current chapter from the database
                                                $currentChapter =
                                                    \App\Models\Chapter::find($chapterId)->title ?? 'Chapter Not Found';
                                            @endphp
                                            <p class="card-text"><strong>Current Chapter:</strong> {{ $currentChapter }}</p>
                                        @endif
                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="{{ route('student.course.show', ['slug' => $course->slug]) }}"
                                            class="btn btn-primary btn-block">Go to Learning</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
