@extends('layouts.app')
@section('pageTitle', 'Instructor Dashboard')
@section('content')

<section id="content" class="py-8">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <h2 class="text-2xl font-semibold">Welcome, {{ Auth::user()->name }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h5 class="text-lg font-semibold">Total Courses</h5>
                <p class="text-gray-700">{{ $totalCourses }}</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h5 class="text-lg font-semibold">Total Enrollments</h5>
                <p class="text-gray-700">{{ $totalEnrollments }}</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h5 class="text-lg font-semibold">Total Revenue</h5>
                <p class="text-gray-700">₦{{ $totalRevenue }}</p>
            </div>
        </div>
        <div>
            <h3 class="text-xl font-semibold mb-4">Course Management</h3>
            <ul class="divide-y divide-gray-200">
                @foreach($courses as $course)
                <li class="flex justify-between items-center py-4">
                    <a href="#" class="text-blue-500 hover:underline">{{ $course->title }}</a>
                    <span class="bg-blue-500 text-white text-sm rounded-full px-3 py-1">{{ $course->users->count() }} Enrollments</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

@endsection
