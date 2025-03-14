@extends('layouts.app')
@section('pageTitle', 'My Courses')
@section('content')
<section id="content" class="mt-4">
    <div class="content-wrap">
        <div class="container mx-auto">
            @if ($courses->isEmpty())
            <div class="p-4 mb-4 text-blue-800 bg-blue-200 rounded-lg" role="alert">
                You are not enrolled in any courses. <a href="{{ route('homepage') }}" class="font-semibold text-blue-600 hover:underline">Explore our courses</a>.
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="/{{ $course->thumbnail }}" alt="{{ $course->title }}">
                    <div class="p-4">
                        <h5 class="text-xl font-semibold mb-2">{{ $course->title }}</h5>
                        @if ($course->pivot->progress)
                        @php
                            $progress = json_decode($course->pivot->progress, true);
                            $chapterId = $progress['current_chapter'] ?? 1;
                            $currentChapter = \App\Models\Chapter::find($chapterId)->title ?? 'Chapter Not Found';
                        @endphp
                        <p class="text-gray-700"><strong>Current Chapter:</strong> {{ $currentChapter }}</p>
                        @endif
                    </div>
                    <div class="p-4 bg-gray-50">
                        <a href="{{ route('student.course.show', ['slug' => $course->slug]) }}" class="block w-full text-center bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-700">Go to Learning</a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
