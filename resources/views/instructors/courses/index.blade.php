@extends('layouts.app')
@section('pageTitle', 'Manage Courses')
@section('content')

<section class="py-8 mt-10">
    <div class="container mx-auto px-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-blue-100 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Course Management</h2>
                <a href="{{ route('courses.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    + Add New Course
                </a>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-3 font-bold uppercase text-gray-600 border-b hidden md:table-cell">#</th>
                                <th class="p-3 font-bold uppercase text-gray-600 border-b">Course Title</th>
                                <th class="p-3 font-bold uppercase text-gray-600 border-b hidden md:table-cell">Category</th>
                                <th class="p-3 font-bold uppercase text-gray-600 border-b hidden md:table-cell">Level</th>
                                <th class="p-3 font-bold uppercase text-gray-600 border-b hidden md:table-cell">Language</th>
                                <th class="p-3 font-bold uppercase text-gray-600 border-b hidden md:table-cell">Price</th>
                                <th class="p-3 font-bold uppercase text-gray-600 border-b hidden md:table-cell">Featured</th>
                                <th class="p-3 font-bold uppercase text-gray-600 border-b hidden md:table-cell">Image</th>
                                <th class="p-3 font-bold uppercase text-gray-600 border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr class="bg-white hover:bg-gray-50">
                                    <td class="p-3 border-b hidden md:table-cell">{{ $loop->iteration }}</td>
                                    <td class="p-3 border-b">
                                        <div class="md:hidden font-bold mb-1">{{ $course->title }}</div>
                                        <div class="hidden md:block">{{ $course->title }}</div>
                                    </td>
                                    <td class="p-3 border-b hidden md:table-cell">{{ $course->category }}</td>
                                    <td class="p-3 border-b hidden md:table-cell">{{ $course->level }}</td>
                                    <td class="p-3 border-b hidden md:table-cell">{{ $course->language }}</td>
                                    <td class="p-3 border-b hidden md:table-cell">{{ $course->price }}</td>
                                    <td class="p-3 border-b hidden md:table-cell">{{ $course->featured ? 'Yes' : 'No' }}</td>
                                    <td class="p-3 border-b hidden md:table-cell">
                                        @if ($course->thumbnail)
                                            <img src="{{ asset($course->thumbnail) }}" class="w-10 h-10 object-cover rounded" alt="Course Image" />
                                        @else
                                            <span class="text-gray-400">No Image</span>
                                        @endif
                                    </td>
                                    <td class="p-3 border-b">
                                        <div class="relative" x-data="{ open: false }">
                                            <button @click="open = !open" class="bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                                                <span>Actions</span>
                                                <svg class="fill-current h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </button>
                                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                                                <a href="{{ route('courses.manage-content', $course->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-cogs mr-2"></i> Create Content
                                                </a>
                                                <a href="{{ route('courses.content.edit', ['id' => $course->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-pen mr-2"></i> Edit Content
                                                </a>
                                                <a href="{{ route('courses.manage-lessons', $course->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-play mr-2"></i> Manage Video Lessons
                                                </a>
                                                <a href="{{ route('courses.edit', $course->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-edit mr-2"></i> Edit Course
                                                </a>
                                                <div class="border-t border-gray-100"></div>
                                                <a href="#" onclick="confirmDelete('{{ route('courses.destroy', $course->id) }}')" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                    <i class="fas fa-trash mr-2"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script>
    function confirmDelete(url) {
        if (confirm('Are you sure you want to delete this course?')) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            form.style.display = 'none';

            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';

            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';

            form.appendChild(csrfToken);
            form.appendChild(methodField);

            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endsection