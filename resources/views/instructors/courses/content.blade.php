@extends('layouts.app')
@section('pageTitle', 'Manage Course Content')
@section('content')

    <section id="content" style="margin-top: -40px;">
        <div class="content-wrap">
            <div class="container">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Course Content</h5>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary">
                            <-- Courses </a>
                    </div>
                    <div class="card-body">
                        <form id="courseForm" method="post"
                            action="{{ route('courses.save-content', ['course' => $course->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div id="chaptersContainer">
                                <!-- Chapters will be dynamically added here -->
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" id="addChapterBtn">Add
                                        Chapter</button>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" id="saveBtn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')
    <script src="/assets/js/components/tinymce/tinymce.min.js"></script>

    <script>
        $(document).ready(function() {
            let chapterCount = 0;

            function initializeTinyMCE(container) {
                container.find('.tinymce').each(function() {
                    const textareaId = $(this).attr('id');

                    // Remove existing TinyMCE instance
                    tinymce.get(textareaId)?.remove();

                    tinymce.init({
                        selector: `#${textareaId}`,
                        plugins: 'advlist autolink lists link charmap preview',
                        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | link',
                        content_style: 'body { font-family: "Arial", sans-serif; font-size: 16px; }',
                        menubar: false,
                        height: 200,
                        setup: function(editor) {
                            editor.on('change', function(e) {
                                editor.save();
                            });
                        }
                    });
                });
            }

            function addChapter() {
                chapterCount++;
                const chapterHtml = `
        <div class="card mb-3">
            <div class="card-header">
                <input type="text" name="chapters[${chapterCount}][title]" class="form-control form-control-sm style-white mb-2" placeholder="Chapter Title" />
                <textarea id="description_${chapterCount}" name="chapters[${chapterCount}][description]" class="form-control mb-2 tinymce" placeholder="Chapter Description"></textarea>
                <input type="number" name="chapters[${chapterCount}][order]" class="form-control style-white form-control-sm" placeholder="Order Number" />
            </div>
            <div class="card-body">
                <div class="mt-3" id="lessonsContainer_${chapterCount}">
                    <!-- Lessons will be dynamically added here -->
                </div>
                <div class="mt-3" id="quizzesContainer_${chapterCount}">
                    <!-- Quizzes will be dynamically added here -->
                </div>
                <div class="mt-3" id="resourcesContainer_${chapterCount}">
                    <!-- Resources will be dynamically added here -->
                </div>
                <div class="float-right mt-3">
                    <button type="button" class="btn btn-success btn-sm" data-type="addLesson" data-chapter="${chapterCount}">Add Lesson</button>
                    <button type="button" class="btn btn-info btn-sm" data-type="addQuiz" data-chapter="${chapterCount}">Add Quiz</button>
                    <button type="button" class="btn btn-warning btn-sm" data-type="addResource" data-chapter="${chapterCount}">Add Resource</button>
                    <button type="button" class="btn btn-danger btn-sm" data-type="deleteChapter">Delete Chapter</button>
                </div>
            </div>
        </div>
    `;

                $('#chaptersContainer').append(chapterHtml);

                // Delay the initialization to ensure the DOM is updated
                setTimeout(() => {
                    initializeTinyMCE($('#chaptersContainer').find('.card').last());
                }, 0);
            }

            function addLesson(chapterNumber) {
                const lessonNumber = $(`#lessonsContainer_${chapterNumber} .card`).length + 1;
                const lessonHtml = `
                <div class="card mt-2">
                    <div class="card-header">
                        <input type="text" name="chapters[${chapterNumber}][lessons][${lessonNumber}][title]" class="form-control form-control-sm style-white mb-2" placeholder="Lesson Title" />
                        <input type="text" name="chapters[${chapterNumber}][lessons][${lessonNumber}][video_url]" class="form-control form-control-sm style-white mb-2" placeholder="Video URL" />
                        <input type="text" name="chapters[${chapterNumber}][lessons][${lessonNumber}][duration]" class="form-control form-control-sm style-white mb-2" placeholder="Duration" />
                        <input type="number" name="chapters[${chapterNumber}][lessons][${lessonNumber}][order]" class="form-control form-control-sm style-white mb-2" placeholder="Order Number" />
                        <div class="float-right">
                            <button type="button" class="btn btn-danger btn-sm" data-type="deleteLesson">Delete Lesson</button>
                        </div>
                    </div>
                </div>
            `;

                $(`#lessonsContainer_${chapterNumber}`).append(lessonHtml);
            }



            function addQuiz(chapterNumber) {
                const quizNumber = $(`#quizzesContainer_${chapterNumber} .card`).length + 1;
                let quizOptions = '';

                // Iterate through quizzes and generate options
                @foreach ($quizzes as $quiz)
                    quizOptions += `<option value="{{ $quiz->id }}">{{ $quiz->title }}</option>`;
                @endforeach

                const quizHtml = `
                        <div class="card mt-2">
                            <div class="card-header">
                                <input type="text" name="chapters[${chapterNumber}][quizzes][${quizNumber}][title]" class="form-control style-white form-control-sm mb-2" placeholder="Quiz Title" />
                                <input type="number" name="chapters[${chapterNumber}][quizzes][${quizNumber}][order]" class="form-control style-white form-control-sm mb-2" placeholder="Order Number" />
                                <select name="chapters[${chapterNumber}][quizzes][${quizNumber}][quiz_id]" class="single-select nice-select form-select style-white mb-2">
                                    ${quizOptions}
                                </select>
                                <div class="float-right">
                                    <button type="button" class="btn btn-danger btn-sm" data-type="deleteQuiz">Delete Quiz</button>
                                </div>
                            </div>
                        </div>
                    `;
                $(`#quizzesContainer_${chapterNumber}`).append(quizHtml);
            }

            function addResource(chapterNumber) {
                const resourceNumber = $(`#resourcesContainer_${chapterNumber} .card`).length + 1;
                const resourceHtml = `
                <div class="card mt-2">
                    <div class="card-header">
                        <input type="text" name="chapters[${chapterNumber}][resources][${resourceNumber}][title]" class="form-control form-control-sm style-white mb-2" placeholder="Resource Title" />
                        <input type="file" name="chapters[${chapterNumber}][resources][${resourceNumber}][file]" class="form-control-file style-white mb-2" />
                        <input type="number" name="chapters[${chapterNumber}][resources][${resourceNumber}][order]" class="form-control form-control-sm style-white mb-2" placeholder="Order Number" />
                        <div class="float-right">
                            <button type="button" class="btn btn-danger btn-sm" data-type="deleteResource">Delete Resource</button>
                        </div>
                    </div>
                </div>
            `;

                $(`#resourcesContainer_${chapterNumber}`).append(resourceHtml);
            }

            $('#addChapterBtn').click(function() {
                addChapter();
            });

            $(document).on('click', '[data-type]', function() {
                const type = $(this).data('type');
                const chapterContainer = $(this).closest('.card');

                switch (type) {
                    case 'addLesson':
                        const chapterNumberLesson = $(this).data('chapter');
                        addLesson(chapterNumberLesson);
                        break;

                    case 'addQuiz':
                        const chapterNumberQuiz = $(this).data('chapter');
                        addQuiz(chapterNumberQuiz);
                        break;

                    case 'addResource':
                        const chapterNumberResource = $(this).data('chapter');
                        addResource(chapterNumberResource);
                        break;

                    case 'deleteChapter':
                        chapterContainer.remove();
                        break;

                    case 'deleteLesson':
                        $(this).closest('.card').remove();
                        break;

                    case 'deleteQuiz':
                        $(this).closest('.card').remove();
                        break;

                    case 'deleteResource':
                        $(this).closest('.card').remove();
                        break;
                }
            });

            $('#courseForm').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log('Data saved successfully:', response);
                        showToast('Success', 'Data saved successfully');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', error);

                        // Handle validation errors
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            // Show toast with validation errors
                            // You can use a library like Toastr or any other toast library
                            showToast('Validation Error', Object.values(errors).flat().join(
                                ', '));
                        } else {
                            // Show a generic error message for other errors
                            showToast('Error', 'An error occurred while saving data.');
                        }
                    }
                });
            });

            function showToast(title, message) {

                alert(title + ': ' + message);
            }

        });
    </script>
@endsection
