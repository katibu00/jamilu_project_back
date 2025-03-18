@extends('layouts.app')
@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-4">
    <div class="max-w-7xl mx-auto">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Courses</h1>
                <p class="mt-1 text-sm text-gray-600">Manage your courses and educational content</p>
            </div>
            <div class="mt-4 md:mt-0">
                <button id="openAddCourseModal" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md shadow-sm flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    <span>Add New Course</span>
                </button>
            </div>
        </div>
        
        <!-- Flash Messages -->
        @if(session('success'))
        <div id="successAlert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" onclick="document.getElementById('successAlert').remove()" class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($errors->any())
            <div id="errorAlert" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="ml-3">
                        <ul class="text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" onclick="document.getElementById('errorAlert').remove()" class="inline-flex rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100 transition ease-in-out duration-150">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-book text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="font-bold text-2xl text-gray-900">{{ $activeCoursesCount }}</h2>
                        <p class="text-sm text-gray-600">Active Courses</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="font-bold text-2xl text-gray-900">{{ number_format($totalStudents) }}</h2>
                        <p class="text-sm text-gray-600">Total Students</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <i class="fas fa-star text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="font-bold text-2xl text-gray-900">{{ number_format($averageRating, 1) }}</h2>
                        <p class="text-sm text-gray-600">Average Rating</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Course List Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <h3 class="text-lg font-medium text-gray-900">Your Courses</h3>
                    <div class="mt-3 md:mt-0 flex">
                        <div class="relative mr-2">
                            <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                <option>All Categories</option>
                                <option>Development</option>
                                <option>Business</option>
                                <option>Design</option>
                                <option>Marketing</option>
                            </select>
                        </div>
                        <div class="relative">
                            <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                <option>Sort by: Recent</option>
                                <option>Sort by: Popular</option>
                                <option>Sort by: Rating</option>
                                <option>Sort by: Title A-Z</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Course Card List -->
            <div class="overflow-x-auto">
                <div class="p-6">
                    @if($courses->count() > 0)
                        @foreach($courses as $course)
                        <!-- Single Course Card -->
                        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 hover:shadow-md transition-shadow duration-200">
                            <div class="flex flex-col md:flex-row">
                                <!-- Course Image -->
                                <div class="md:w-64 flex-shrink-0">
                                    @if($course->thumbnail)
                                    <img src="{{ Storage::url($course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-48 md:h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none">
                                @else
                                    <div class="w-full h-48 md:h-full bg-gray-200 flex items-center justify-center rounded-t-lg md:rounded-l-lg md:rounded-t-none">
                                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Course Details -->
                            <div class="flex-1 p-4 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between">
                                        @if($course->published)
                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Published</span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Draft</span>
                                        @endif
                                        <!-- Dropdown Menu -->
                                        <div class="relative" x-data="{ open: false }">
                                            <button @click="open = !open" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div x-show="open" @click.away="open = false" x-cloak 
                                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                                <a href="{{ route('courses.content.edit', ['id' => $course->id]) }}" 
                                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-pen mr-2 text-blue-600"></i> Edit Content
                                                </a>
                                                <a href="{{ route('courses.manage-content', $course->id) }}" 
                                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-cogs mr-2 text-gray-600"></i> Create Content
                                                </a>
                                                <a href="{{ route('courses.edit', $course) }}" 
                                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-edit mr-2 text-blue-600"></i> Edit Course
                                                </a>
                                                <a href="{{ route('courses.show', $course) }}" 
                                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-eye mr-2 text-green-600"></i> Preview
                                                </a>
                                                <button onclick="event.preventDefault(); document.getElementById('delete-course-{{ $course->id }}').submit();" 
                                                        class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                    <i class="fas fa-trash mr-2"></i> Delete
                                                </button>
                                                <form id="delete-course-{{ $course->id }}" action="{{ route('courses.destroy', $course) }}" method="POST" class="hidden">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 mt-2">{{ $course->title }}</h4>
                                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ $course->short_description }}</p>
                                    
                                    <div class="mt-3 space-y-3">
                                        @if(!empty(json_decode($course->tags)))
                                        <div class="flex flex-wrap gap-2">
                                            @foreach(json_decode($course->tags) as $tag)
                                            <span class="bg-blue-50 text-blue-700 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                        @endif
                                        
                                        <div class="flex items-center text-sm">
                                            <i class="fas fa-book mr-1 text-gray-500"></i>
                                            <span class="text-gray-600">{{ $course->lessons_count ?? 0 }} lessons</span>
                                            <span class="mx-2 text-gray-300">|</span>
                                            <i class="fas fa-clock mr-1 text-gray-500"></i>
                                            <span class="text-gray-600">{{ $course->duration_minutes ? $course->duration_minutes . ' mins' : 'N/A' }}</span>
                                            <span class="mx-2 text-gray-300">|</span>
                                            <i class="fas fa-signal mr-1 text-gray-500"></i>
                                            <span class="text-gray-600">{{ ucfirst($course->level) }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4 flex flex-col sm:flex-row sm:items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            {{-- Replace with actual rating calculation if available --}}
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star-half-alt text-yellow-400"></i>
                                            <span class="ml-1 text-sm text-gray-600">4.7</span>
                                        </div>
                                        <span class="mx-2 text-gray-300">|</span>
                                        <div class="flex items-center">
                                            <i class="fas fa-users mr-1 text-gray-500"></i>
                                            <span class="text-sm text-gray-600">{{ $course->students_count ?? 0 }} students</span>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:mt-0">
                                        @if($course->is_free)
                                            <span class="text-lg font-bold text-green-600">Free</span>
                                        @else
                                            @if($course->has_discount && $course->discount_price)
                                                <span class="text-lg font-bold text-green-600">₦{{ number_format($course->discount_price, 2) }}</span>
                                                <span class="text-sm text-gray-500 line-through ml-2">₦{{ number_format($course->price, 2) }}</span>
                                            @else
                                                <span class="text-lg font-bold text-green-600">₦{{ number_format($course->price, 2) }}</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('courses.edit', $course) }}" class="inline-flex items-center px-3 py-1.5 border border-blue-600 text-blue-600 rounded-md text-sm font-medium hover:bg-blue-50">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <a href="{{ route('courses.show', $course) }}" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-50">
                                        <i class="fas fa-eye mr-1"></i> Preview
                                    </a>
                                    <a href="#" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-50">
                                        <i class="fas fa-chart-line mr-1"></i> Stats
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="text-center py-10">
                        <div class="text-gray-400 mb-3">
                            <i class="fas fa-graduation-cap text-5xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">No courses yet</h3>
                        <p class="text-gray-500 mt-1">Get started by creating your first course.</p>
                        <button id="createFirstCourse" class="mt-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-plus mr-2"></i> Create Course
                        </button>
                    </div>
                @endif
                
                <!-- Pagination -->
                @if($courses->count() > 0)
                <div class="flex items-center justify-between mt-6">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium">{{ $courses->firstItem() }}</span> to <span class="font-medium">{{ $courses->lastItem() }}</span> of <span class="font-medium">{{ $courses->total() }}</span> courses
                    </div>
                    <div>
                        {{ $courses->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</main>

<!-- Add New Course Modal -->
<div id="addCourseModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 text-center">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
        <div class="inline-block w-full max-w-2xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-lg">
            <form id="createCourseForm" action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center justify-between pb-3 border-b">
                    <h3 class="text-lg font-medium text-gray-900">Create New Course</h3>
                    <button type="button" id="closeModal" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Close</span>
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="space-y-4 mt-4 max-h-[70vh] overflow-y-auto px-1">
                    <!-- Course Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                        <input type="text" name="title" id="title" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    
                    <!-- Short Description -->
                    <div>
                        <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
                        <textarea name="short_description" id="short_description" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    
                    <!-- Full Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Full Description</label>
                        <textarea name="description" id="description" rows="4" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    
                    <!-- Level and Language -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="level" class="block text-sm font-medium text-gray-700">Course Level</label>
                            <select name="level" id="level" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                                <option value="all-levels" selected>All Levels</option>
                            </select>
                        </div>
                        <div>
                            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                            <select name="language" id="language" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="english" selected>English</option>
                                <option value="hausa">Hausa</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Price Options -->
                    <div>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="is_free" id="is_free" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <label for="is_free" class="ml-2 block text-sm text-gray-700">Free Course</label>
                        </div>
                        
                        <div id="priceFields" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700">Regular Price (₦)</label>
                                <input type="number" name="price" id="price" step="0.01" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            
                            <div>
                                <div class="flex items-center mb-2">
                                    <input type="checkbox" name="has_discount" id="has_discount" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <label for="has_discount" class="ml-2 block text-sm text-gray-700">Discount Price</label>
                                </div>
                                <input type="number" name="discount_price" id="discount_price" step="0.01" disabled class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-gray-100">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Duration -->
                    <div>
                        <label for="duration_minutes" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                        <input type="number" name="duration_minutes" id="duration_minutes" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    
                    <!-- Tags -->
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700">Tags (comma separated)</label>
                        <input type="text" name="tags" id="tags" placeholder="e.g. javascript, programming, web development" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    
                    <!-- Featured and Published -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="is_featured" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <label for="is_featured" class="ml-2 block text-sm text-gray-700">Featured Course</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" name="published" id="published" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <label for="published" class="ml-2 block text-sm text-gray-700">Publish Immediately</label>
                        </div>
                    </div>
                    
                    <!-- Thumbnail -->
                    <div>
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Course Thumbnail</label>
                        <div class="mt-1 flex items-center">
                            <span class="inline-block h-12 w-12 rounded-md overflow-hidden bg-gray-100">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        </div>
                    </div>
                    
                    <!-- Featured Video URL -->
                    <div>
                        <label for="featured_video" class="block text-sm font-medium text-gray-700">Featured Video URL (optional)</label>
                        <input type="text" name="featured_video" id="featured_video" placeholder="YouTube or Vimeo URL" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
                
                <div class="pt-4 border-t mt-5 flex justify-end space-x-3">
                    <button type="button" id="cancelBtn" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Create Course
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addCourseBtn = document.querySelector('button.bg-blue-600');
        const modal = document.getElementById('addCourseModal');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const isFreeCheckbox = document.getElementById('is_free');
        const priceFields = document.getElementById('priceFields');
        const hasDiscountCheckbox = document.getElementById('has_discount');
        const discountPriceInput = document.getElementById('discount_price');
        
        // Open modal
        addCourseBtn.addEventListener('click', function() {
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });
        
        // Close modal functions
        const closeModalFunction = function() {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        };
        
        closeModal.addEventListener('click', closeModalFunction);
        cancelBtn.addEventListener('click', closeModalFunction);
        
        // Close on outside click
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModalFunction();
            }
        });
        
        // Free course toggle
        isFreeCheckbox.addEventListener('change', function() {
            if (this.checked) {
                priceFields.querySelectorAll('input').forEach(input => {
                    input.disabled = true;
                    input.classList.add('bg-gray-100');
                });
                hasDiscountCheckbox.disabled = true;
            } else {
                priceFields.querySelectorAll('input[name="price"]').forEach(input => {
                    input.disabled = false;
                    input.classList.remove('bg-gray-100');
                });
                hasDiscountCheckbox.disabled = false;
                
                // Restore discount field state
                if (hasDiscountCheckbox.checked) {
                    discountPriceInput.disabled = false;
                    discountPriceInput.classList.remove('bg-gray-100');
                }
            }
        });
        
// Discount price toggle
hasDiscountCheckbox.addEventListener('change', function() {
            if (this.checked) {
                discountPriceInput.disabled = false;
                discountPriceInput.classList.remove('bg-gray-100');
            } else {
                discountPriceInput.disabled = true;
                discountPriceInput.classList.add('bg-gray-100');
            }
        });
        
        // Generate slug when title changes
        const titleInput = document.getElementById('title');
        
        titleInput.addEventListener('blur', function() {
            // We'll let the backend handle slug generation
            // But could add AJAX call here to check slug availability
        });
        
        // Form validation
        const form = document.getElementById('createCourseForm');
        
        form.addEventListener('submit', function(e) {
            let valid = true;
            
            // Basic validation
            if (!titleInput.value.trim()) {
                valid = false;
                titleInput.classList.add('border-red-500');
            } else {
                titleInput.classList.remove('border-red-500');
            }
            
            // More validation could be added here
            
            if (!valid) {
                e.preventDefault();
            }
        });
    });
</script>

@endsection