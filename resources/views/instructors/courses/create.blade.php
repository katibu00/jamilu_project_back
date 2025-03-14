@extends('layouts.app')
@section('pageTitle', 'Create a New Course')
@section('content')

<section id="content" class="mt-0 py-8">
    <div class="container mx-auto px-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-100 px-6 py-4 flex justify-between items-center">
                <h5 class="text-xl font-semibold text-blue-900">Create a New Course</h5>
                <a href="{{ route('courses.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    &larr; Courses
                </a>
            </div>
            
            <div class="p-6">
                <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Course Title*</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Short Description</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="short_description" value="{{ old('short_description') }}">
                        @error('short_description')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" cols="30" rows="10">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Category*</label>
                        <div class="relative">
                            <select id="cates" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="category">
                                <option value="" selected>&nbsp;</option>
                                <option value="Web Development" {{ old('category') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                <option value="UX/UI Design" {{ old('category') == 'UX/UI Design' ? 'selected' : '' }}>UX/UI Design</option>
                                <option value="Digital Marketing" {{ old('category') == 'Digital Marketing' ? 'selected' : '' }}>Digital Marketing</option>
                                <option value="Graphics Design" {{ old('category') == 'Graphics Design' ? 'selected' : '' }}>Graphics Design</option>
                                <option value="Video Editing" {{ old('category') == 'Video Editing' ? 'selected' : '' }}>Video Editing</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        @error('category')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Level</label>
                        <div class="relative">
                            <select id="lvl" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="level">
                                <option value="" selected>&nbsp;</option>
                                <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                <option value="Expert" {{ old('level') == 'Expert' ? 'selected' : '' }}>Expert</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        @error('level')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tags/Keywords</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tags" value="{{ old('tags') }}">
                        @error('tags')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Language</label>
                        <div class="relative">
                            <select id="lgu" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="language">
                                <option value="" selected>&nbsp;</option>
                                <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                                <option value="Hausa" {{ old('language') == 'Hausa' ? 'selected' : '' }}>Hausa</option>
                                <option value="Pidgin" {{ old('language') == 'Pidgin' ? 'selected' : '' }}>Pidgin</option>
                                <option value="Yoruba" {{ old('language') == 'Yoruba' ? 'selected' : '' }}>Yoruba</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        @error('language')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="mb-4">
                        <input id="featured" type="checkbox" class="mr-2 leading-tight" name="featured" {{ old('featured') ? 'checked' : '' }}>
                        <label for="featured" class="text-gray-700 text-sm">Check this for featured course</label>
                        @error('featured')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input id="is_free" type="checkbox" class="mr-2 leading-tight" name="is_free" {{ old('is_free') ? 'checked' : '' }}>
                        <label for="is_free" class="text-gray-700 text-sm">Check this if Course is Free</label>
                        @error('is_free')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Course Price (NGN)</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="price" value="{{ old('price') }}">
                        @error('price')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Discount Price (NGN)</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="discount_price" value="{{ old('discount_price') }}">
                        <input id="has_discount" type="checkbox" class="mr-2 leading-tight" name="has_discount" {{ old('has_discount') ? 'checked' : '' }}>
                        <label for="has_discount" class="text-gray-700 text-sm">Enable This Discount</label>
                        @error('discount_price')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Featured Video URL</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="video_url" value="{{ old('video_url') }}">
                        @error('video_url')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Thumbnail</label>
                        <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="customFile" name="thumbnail">
                        @error('thumbnail')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="/assets/js/components/tinymce/tinymce.min.js"></script>
<script>
    jQuery(document).ready(function() {
        tinymce.init({
            selector: '#description',
            plugins: 'advlist autolink lists link charmap preview',
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | link',
            content_style: 'body { font-family: "Arial", sans-serif; font-size: 16px; }',
            menubar: false,
            setup: function(editor) {
                editor.on('change', function(e) {
                    editor.save();
                });
            }
        });
    });
</script>
@endsection
