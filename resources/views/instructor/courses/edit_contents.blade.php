@extends('layouts.app')
@section('pageTitle', 'Edit Course Content')
@section('content')

<section id="content" class="-mt-10">
    <div class="container mx-auto">
        <div class="my-20 space-y-6">
            @foreach ($course->chapters as $chapter)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="bg-blue-100 px-4 py-3 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">{{ $chapter->title }}</h5>
                            <div class="text-sm text-gray-600">{!! $chapter->description !!}</div>
                        </div>
                        <div class="space-x-2">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm" onclick="openModal('editChapterModal{{ $chapter->id }}')">Edit Chapter</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm" onclick="confirmDeleteChapter({{ $chapter->id }})">Delete Chapter</button>
                        </div>
                    </div>

                    <div class="p-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order #</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($chapter->contents as $content)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $content->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $content->content_type }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $content->order_number }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                            @if ($content->content_type === 'lessons')
                                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm" onclick="openModal('editLessonModal{{ $content->id }}')">Edit Lesson</button>
                                            @elseif($content->content_type === 'quiz')
                                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm" onclick="openModal('editQuizModal{{ $content->id }}')">Edit Quiz</button>
                                            @elseif($content->content_type === 'resources')
                                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm" onclick="openModal('editResourceModal{{ $content->id }}')">Edit Resource</button>
                                            @endif
                                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm" onclick="confirmDeleteContent({{ $content->id }}, '{{ $content->title }}')">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4 space-x-2">
                            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded" onclick="openModal('addLessonModal{{ $chapter->id }}')">Add Lesson</button>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded" onclick="openModal('addQuizModal{{ $chapter->id }}')">Add Quiz</button>
                            <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded" onclick="openModal('addResourceModal{{ $chapter->id }}')">Add Resource</button>
                        </div>
                    </div>
                </div>

                @include('partials.edit_chapter_modal', ['chapter' => $chapter])
                @include('partials.add_lesson_modal', ['chapter' => $chapter])
                @include('partials.add_quiz_modal', ['chapter' => $chapter])
                @include('partials.add_resource_modal', ['chapter' => $chapter])

                @foreach ($chapter->contents as $content)
                    @if ($content->content_type === 'lessons')
                        @include('partials.edit_lesson_modal', ['content' => $content])
                    @elseif ($content->content_type === 'quiz')
                        @include('partials.edit_quiz_modal', ['content' => $content])
                    @elseif ($content->content_type === 'resources')
                        @include('partials.edit_resource_modal', ['content' => $content])
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    function confirmDeleteContent(contentId, contentTitle) {
        var confirmation = confirm("Are you sure you want to delete the content '" + contentTitle + "'?");
        if (confirmation) {
            window.location.href = "{{ route('courses.delete-content') }}?contentId=" + contentId;
        }
    }

    function confirmDeleteChapter(chapterId) {
        var confirmation = confirm("Are you sure you want to delete this chapter?");
        if (confirmation) {
            // Add your delete chapter logic here
        }
    }
</script>

<script src="/assets/js/components/tinymce/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector: '.tinymce',
        plugins: 'advlist autolink lists link charmap preview',
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | link',
        content_style: 'body { font-family: "Arial", sans-serif; font-size: 16px; }',
        menubar: false,
        height: 200,
        setup: function (editor) {
            editor.on('change', function (e) {
                editor.save();
            });
        }
    });
</script>
@endsection