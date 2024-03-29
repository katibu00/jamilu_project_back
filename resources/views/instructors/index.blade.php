@extends('layouts.app')
@section('pageTitle', 'Instructor Dashboard')
@section('content')

<section id="content">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Welcome, {{ Auth::user()->name }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Courses</h5>
                            <p class="card-text">{{ $totalCourses }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Enrollments</h5>
                            <p class="card-text">{{ $totalEnrollments }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Revenue</h5>
                            <p class="card-text">₦{{ $totalRevenue }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <h3>Course Management</h3>
                    <ul class="list-group">
                        @foreach($courses as $course)
                        <li class="list-group-item">
                            <a href="#">{{ $course->title }}</a>
                            <span class="badge bg-primary badge-pill">{{ $course->users->count() }} Enrollments</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Additional Dashboard Components can be added here -->
        </div>
    </div>
</section>

@endsection
