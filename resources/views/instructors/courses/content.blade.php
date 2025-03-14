@extends('layouts.app')
@section('pageTitle', 'Manage Course Content')
@section('content')

<section id="content" class="py-8">
    <div class="container mx-auto px-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="flex justify-between items-center bg-blue-100 px-6 py-4">
                <h5 class="text-xl font-semibold text-gray-700">Create Course Content</h5>
                <a href="{{ route('courses.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    &larr; Courses
                </a>
            </div>
            <div class="p-6">
                <form id="courseForm" method="post" action="{{ route('courses.save-content', ['course' => $course->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div id="chaptersContainer">
                        <!-- Chapters will be dynamically added here -->
                    </div>

                    <div class="mt-6">
                        <button type="button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" id="addChapterBtn">
                            Add Chapter
                        </button>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" id="saveBtn">
                            Save
                        </button>
                    </div>
                </form>
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
            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
                <div class="bg-gray-100 px-6 py-4">
                    <input type="text" name="chapters[${chapterCount}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Chapter Title" />
                    <textarea id="description_${chapterCount}" name="chapters[${chapterCount}][description]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2 tinymce" placeholder="Chapter Description"></textarea>
                    <input type="number" name="chapters[${chapterCount}][order]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Order Number" />
                </div>
                <div class="px-6 py-4">
                    <div class="mt-3" id="lessonsContainer_${chapterCount}">
                        <!-- Lessons will be dynamically added here -->
                    </div>
                    <div class="mt-3" id="quizzesContainer_${chapterCount}">
                        <!-- Quizzes will be dynamically added here -->
                    </div>
                    <div class="mt-3" id="resourcesContainer_${chapterCount}">
                        <!-- Resources will be dynamically added here -->
                    </div>
                    <div class="flex justify-end mt-4 space-x-2">
                        <button type="button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded text-sm" data-type="addLesson" data-chapter="${chapterCount}">Add Lesson</button>
                        <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded text-sm" data-type="addQuiz" data-chapter="${chapterCount}">Add Quiz</button>
                        <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded text-sm" data-type="addResource" data-chapter="${chapterCount}">Add Resource</button>
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm" data-type="deleteChapter">Delete Chapter</button>
                    </div>
                </div>
            </div>
        `;

        $('#chaptersContainer').append(chapterHtml);

        // Delay the initialization to ensure the DOM is updated
        setTimeout(() => {
            initializeTinyMCE($('#chaptersContainer').find('.bg-white').last());
        }, 0);
    }

    function addLesson(chapterNumber) {
        const lessonNumber = $(`#lessonsContainer_${chapterNumber} .bg-white`).length + 1;
        const lessonHtml = `
            <div class="bg-white shadow-md rounded-lg overflow-hidden mt-4">
                <div class="bg-gray-100 px-6 py-4">
                    <input type="text" name="chapters[${chapterNumber}][lessons][${lessonNumber}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Lesson Title" />
                    <input type="text" name="chapters[${chapterNumber}][lessons][${lessonNumber}][duration]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Duration" />
                    <input type="number" name="chapters[${chapterNumber}][lessons][${lessonNumber}][order]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Order Number" />
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm" data-type="deleteLesson">Delete Lesson</button>
                    </div>
                </div>
            </div>
        `;

        $(`#lessonsContainer_${chapterNumber}`).append(lessonHtml);
    }

    function addQuiz(chapterNumber) {
        const quizNumber = $(`#quizzesContainer_${chapterNumber} .bg-white`).length + 1;
        let quizOptions = '';

        // Iterate through quizzes and generate options
        @foreach ($quizzes as $quiz)
            quizOptions += `<option value="{{ $quiz->id }}">{{ $quiz->title }}</option>`;
        @endforeach

        const quizHtml = `
            <div class="bg-white shadow-md rounded-lg overflow-hidden mt-4">
                <div class="bg-gray-100 px-6 py-4">
                    <input type="text" name="chapters[${chapterNumber}][quizzes][${quizNumber}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Quiz Title" />
                    <input type="number" name="chapters[${chapterNumber}][quizzes][${quizNumber}][order]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Order Number" />
                    <select name="chapters[${chapterNumber}][quizzes][${quizNumber}][quiz_id]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2 appearance-none">
                        ${quizOptions}
                    </select>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm" data-type="deleteQuiz">Delete Quiz</button>
                    </div>
                </div>
            </div>
        `;
        $(`#quizzesContainer_${chapterNumber}`).append(quizHtml);
    }

    function addResource(chapterNumber) {
        const resourceNumber = $(`#resourcesContainer_${chapterNumber} .bg-white`).length + 1;
        const resourceHtml = `
            <div class="bg-white shadow-md rounded-lg overflow-hidden mt-4">
                <div class="bg-gray-100 px-6 py-4">
                    <input type="text" name="chapters[${chapterNumber}][resources][${resourceNumber}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Resource Title" />
                    <input type="file" name="chapters[${chapterNumber}][resources][${resourceNumber}][file]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
                    <input type="number" name="chapters[${chapterNumber}][resources][${resourceNumber}][order]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Order Number" />
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm" data-type="deleteResource">Delete Resource</button>
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
        const chapterContainer = $(this).closest('.bg-white');

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
            case 'deleteQuiz':
            case 'deleteResource':
                $(this).closest('.bg-white').remove();
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
                showToast('Success', 'Data saved successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error saving data:', error);

                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    showToast('Validation Error', Object.values(errors).flat().join(', '));
                } else {
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