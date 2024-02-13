@extends('layouts.app')
@section('pageTitle', 'Edit Course Content')
@section('content')

    <section id="content" style="margin-top: -40px;">
        <div class="content-wrap">
            <div class="container">

                {{-- <h2>Edit Course Content</h2> --}}
                <div class="row mt-4">
                    @foreach ($course->chapters as $chapter)
                        <div class="card mb-3">
                            @if (session('success'))
                                <div class="container">
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-header">
                                <h5>{{ $chapter->title }}</h5>
                                {!! $chapter->description !!}
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editChapterModal{{ $chapter->id }}">Edit Chapter</button>
                                <button class="btn btn-danger btn-sm"
                                    onclick="confirmDeleteChapter({{ $chapter->id }})">Delete Chapter</button>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Order #</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chapter->contents as $content)
                                            <tr>
                                                <td>{{ $content->title }}</td>
                                                <td>{{ $content->content_type }}</td>
                                                <td>{{ $content->order_number }}</td>
                                                <td>
                                                    @if ($content->content_type === 'lessons')
                                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#editLessonModal{{ $content->id }}">Edit
                                                            Lesson</button>
                                                    @elseif($content->content_type === 'quiz')
                                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#editQuizModal{{ $content->id }}">Edit
                                                            Quiz</button>
                                                    @elseif($content->content_type === 'resources')
                                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#editResourceModal{{ $content->id }}">Edit
                                                            Resource</button>
                                                    @endif
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="confirmDeleteContent({{ $content->id }}, '{{ $content->title }}')">Delete</button>
                                                </td>
                                            </tr>
                                            @if ($chapter->contents->contains('content_type', 'lessons'))
                                                @include('partials.edit_lesson_modal')
                                            @endif

                                            @if ($chapter->contents->contains('content_type', 'quiz'))
                                                @include('partials.edit_quiz_modal')
                                            @endif

                                            @if ($chapter->contents->contains('content_type', 'resources'))
                                                @include('partials.edit_resource_modal')
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Add Content Buttons -->
                                <div class="mt-3">
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addLessonModal{{ $chapter->id }}">Add Lesson</button>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addQuizModal{{ $chapter->id }}">Add Quiz</button>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addResourceModal{{ $chapter->id }}">Add Resource</button>
                                </div>
                            </div>
                        </div>

                <!-- Edit Chapter Modal -->
                @include('partials.edit_chapter_modal')





                <!-- Modals for adding content -->
                @include('partials.add_lesson_modal')
                @include('partials.add_quiz_modal')
                @include('partials.add_resource_modal')
                @endforeach


            </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function confirmDeleteContent(contentId, contentTitle) {
            var confirmation = confirm("Are you sure you want to delete the content '" + contentTitle + "'?");
            if (confirmation) {
                window.location.href = "{{ route('courses.delete-content') }}?contentId=" + contentId;
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
