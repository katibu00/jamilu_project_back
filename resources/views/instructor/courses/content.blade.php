@extends('layouts.app')
@section('pageTitle', 'Manage Course Content')
@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-4">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="flex justify-between items-center bg-blue-100 px-6 py-4">
                <h5 class="text-xl font-semibold text-gray-700">Create Course Content</h5>
                <a href="{{ route('courses.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-150">
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
                        <button type="button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-150" id="addChapterBtn">
                            Add Chapter
                        </button>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-150" id="saveBtn">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@push('scripts')
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
                    <div class="flex flex-wrap justify-end mt-4 gap-2">
                        <button type="button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded text-sm transition duration-150" data-type="addLesson" data-chapter="${chapterCount}">Add Lesson</button>
                        <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded text-sm transition duration-150" data-type="addQuiz" data-chapter="${chapterCount}">Add Quiz</button>
                        <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded text-sm transition duration-150" data-type="addResource" data-chapter="${chapterCount}">Add Resource</button>
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm transition duration-150" data-type="deleteChapter">Delete Chapter</button>
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
                    
                    <!-- Video URL Field -->
                    <input type="url" name="chapters[${chapterNumber}][lessons][${lessonNumber}][video_url]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Video URL" />
                    
                    <!-- Duration Fields -->
                    <div class="grid grid-cols-3 gap-2 mb-2">
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Hours</label>
                            <input type="number" min="0" name="chapters[${chapterNumber}][lessons][${lessonNumber}][hours]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Hours" />
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Minutes</label>
                            <input type="number" min="0" max="59" name="chapters[${chapterNumber}][lessons][${lessonNumber}][minutes]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Minutes" />
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Seconds</label>
                            <input type="number" min="0" max="59" name="chapters[${chapterNumber}][lessons][${lessonNumber}][seconds]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Seconds" />
                        </div>
                    </div>
                    
                    <input type="number" name="chapters[${chapterNumber}][lessons][${lessonNumber}][order]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Order Number" />
                    
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm transition duration-150" data-type="deleteLesson">Delete Lesson</button>
                    </div>
                </div>
            </div>
        `;

        $(`#lessonsContainer_${chapterNumber}`).append(lessonHtml);
    }

    function addQuiz(chapterNumber) {
        const quizNumber = $(`#quizzesContainer_${chapterNumber} .bg-white`).length + 1;
        const textareaId = `quiz_description_${chapterNumber}_${quizNumber}`;
        let quizOptions = '';

        // Iterate through quizzes and generate options
        @foreach ($quizzes as $quiz)
            quizOptions += `<option value="{{ $quiz->id }}">{{ $quiz->title }}</option>`;
        @endforeach

        const quizHtml = `
            <div class="bg-white shadow-md rounded-lg overflow-hidden mt-4">
                <div class="bg-gray-100 px-6 py-4">
                    <input type="text" name="chapters[${chapterNumber}][quizzes][${quizNumber}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Quiz Title" />
                    
                    <!-- Quiz Description Field -->
                    <textarea id="${textareaId}" name="chapters[${chapterNumber}][quizzes][${quizNumber}][description]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2 tinymce" placeholder="Quiz Description (Optional)"></textarea>
                    
                    <input type="number" name="chapters[${chapterNumber}][quizzes][${quizNumber}][order]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Order Number" />
                    <select name="chapters[${chapterNumber}][quizzes][${quizNumber}][quiz_id]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2">
                        <option value="">Select Quiz</option>
                        ${quizOptions}
                    </select>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm transition duration-150" data-type="deleteQuiz">Delete Quiz</button>
                    </div>
                </div>
            </div>
        `;
        $(`#quizzesContainer_${chapterNumber}`).append(quizHtml);
        
        // Initialize TinyMCE for the quiz description
        setTimeout(() => {
            initializeTinyMCE($(`#quizzesContainer_${chapterNumber}`).find('.bg-white').last());
        }, 0);
    }

    function addResource(chapterNumber) {
        const resourceNumber = $(`#resourcesContainer_${chapterNumber} .bg-white`).length + 1;
        const textareaId = `resource_description_${chapterNumber}_${resourceNumber}`;
        const resourceHtml = `
            <div class="bg-white shadow-md rounded-lg overflow-hidden mt-4">
                <div class="bg-gray-100 px-6 py-4">
                    <input type="text" name="chapters[${chapterNumber}][resources][${resourceNumber}][title]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Resource Title" />
                    
                    <!-- Resource Description Field -->
                    <textarea id="${textareaId}" name="chapters[${chapterNumber}][resources][${resourceNumber}][description]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2 tinymce" placeholder="Resource Description (Optional)"></textarea>
                    
                    <input type="file" name="chapters[${chapterNumber}][resources][${resourceNumber}][file]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
                    <input type="number" name="chapters[${chapterNumber}][resources][${resourceNumber}][order]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Order Number" />
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm transition duration-150" data-type="deleteResource">Delete Resource</button>
                    </div>
                </div>
            </div>
        `;

        $(`#resourcesContainer_${chapterNumber}`).append(resourceHtml);
        
        // Initialize TinyMCE for the resource description
        setTimeout(() => {
            initializeTinyMCE($(`#resourcesContainer_${chapterNumber}`).find('.bg-white').last());
        }, 0);
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
                showToast('Success', 'Course content saved successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error saving data:', error);

                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    showToast('Validation Error', Object.values(errors).flat().join(', '));
                } else {
                    showToast('Error', 'An error occurred while saving course content.');
                }
            }
        });
    });

    function showToast(title, message) {
        // You might want to implement a more sophisticated toast notification here
        alert(title + ': ' + message);
    }
});
</script>
@endpush
@endsection