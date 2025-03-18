    <li class="menu-item {{ $route == 'home.instructor' ? 'current' : '' }}"><a class="menu-link" href="{{ route('home.instructor') }}">Home</a></li>
    <li class="menu-item {{ $route == 'courses.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('courses.index') }}">Courses</a></li>
    <li class="menu-item {{ $route == 'instructor.assessments.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('instructor.assessments.index') }}">Assessments</a></li>
    <li class="menu-item {{ $route == 'instructor.enrollments.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('instructor.enrollments.index') }}">Enrollments</a></li>
    <li class="menu-item {{ $route == 'instructor.discussions.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('instructor.discussions.index') }}">Discussions</a></li>
    <li class="menu-item {{ $route == 'instructor.reviews.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('instructor.reviews.index') }}">Reviews</a></li>
