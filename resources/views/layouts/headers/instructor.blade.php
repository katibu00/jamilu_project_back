<ul class="menu-container">
    <li class="menu-item {{ $route == 'home.instructor' ? 'current' : '' }}"><a class="menu-link" href="{{ route('home.instructor') }}"><div>Home</div></a></li>
    <li class="menu-item {{ $route == 'courses.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('courses.index') }}"><div>Courses</div></a></li>
    <li class="menu-item {{ $route == 'instructor.assessments.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('instructor.assessments.index') }}"><div>Assessments</div></a></li>
    <li class="menu-item {{ $route == 'instructor.enrollments.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('instructor.enrollments.index') }}"><div>Enrollments</div></a></li>
    <li class="menu-item {{ $route == 'instructor.discussions.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('instructor.discussions.index') }}"><div>Discussions</div></a></li>
    <li class="menu-item {{ $route == 'instructor.reviews.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('instructor.reviews.index') }}"><div>Reviews</div></a></li>

</ul>