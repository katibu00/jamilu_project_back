<ul class="space-y-1">
    <li>
        <a href="{{ route('instructor.dashboard') }}" class="flex items-center px-4 py-2 {{ Request::routeIs('instructor.dashboard') ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
            <i class="fas fa-home w-5 h-5 mr-3 {{ Request::routeIs('instructor.dashboard') ? '' : 'text-gray-500' }}"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <!-- Courses menu -->
        <div class="{{ Request::routeIs('courses.*') ? 'px-4 py-2 text-blue-600 bg-blue-50 font-medium' : 'px-4 py-2 text-gray-600 hover:bg-gray-100' }}">
            <div class="flex items-center">
                <i class="fas fa-book w-5 h-5 mr-3 {{ Request::routeIs('courses.*') ? '' : 'text-gray-500' }}"></i>
                <span>Courses</span>
            </div>
        </div>
        <ul class="ml-4 mt-1 space-y-1">
            <li>
                <a href="{{ route('courses.index') }}" class="flex items-center px-4 py-2 {{ Request::routeIs('courses.index') ? 'text-blue-600 bg-blue-50 border-l-2 border-blue-600' : 'text-gray-600 hover:bg-gray-100' }}">
                    <span class="ml-4">All Courses</span>
                </a>
            </li>
        </ul>
    </li>
</ul>