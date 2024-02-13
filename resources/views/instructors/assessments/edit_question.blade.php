@extends('layouts.app')
@section('pageTitle', 'Edit Question')
@section('css')
    <link href="/toastr/toastr.min.css" rel="stylesheet">
@endsection
@section('content')

<section id="content" style="margin-top: -40px;">
    <div class="content-wrap">
            <div class="container">

                <div class="card">
                    <div class="card-header">Edit Question</div>

                    <div class="card-body">
                        <form id="editQuestionForm">
                            @csrf
                            <div class="mb-3">
                                <label for="questionContent" class="form-label">Question Content</label>
                                <textarea id="questionContent" name="questionContent" class="form-control tinymce">{{ $question->question }}</textarea>
                            </div>

                            <div id="optionsContainer">
                                @php
                                    $options = json_decode($question->options, true);
                                    $correctAnswer = $question->correct_answer;
                                @endphp

                                @foreach ($options as $index => $option)
                                    <div class="mb-3 option-row">
                                        <label class="form-label">Option {{ $index + 1 }}</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="option[]" required
                                                value="{{ $option }}">
                                            <div class="input-group-text">
                                                <input type="radio" name="correct_option" value="{{ $option }}"
                                                    {{ $option === $correctAnswer ? 'checked' : '' }} required>
                                                <label class="form-check-label ms-2">Correct</label>
                                            </div>
                                            <button type="button" class="btn btn-danger remove-option-btn">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-secondary mt-2" id="addOptionBtn">+ Add Option</button>
                            <button type="button" class="btn btn-primary mt-2" id="saveQuestionBtn">Save Question</button>
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
    <script>
        $(document).ready(function() {
            // Function to add a new option input field
            var optionCount = 1;

            function addOptionInput() {
                if (optionCount <= 5) {
                    var optionsContainer = $('#optionsContainer');

                    var optionRow = $('<div class="mb-3 option-row"></div>');
                    var optionLabel = $('<label class="form-label">Option ' + optionCount + '</label>');
                    var inputGroup = $('<div class="input-group"></div>');
                    var optionInput = $('<input type="text" class="form-control" name="option[]" required>');
                    var inputGroupText = $('<div class="input-group-text"></div>');
                    var correctOptionRadio = $('<input type="radio" name="correct_option" value="' + optionInput
                        .val() + '" required>');
                    var correctOptionLabel = $('<label class="form-check-label ms-2">Correct</label>');
                    var removeOptionBtn = $(
                        '<button type="button" class="btn btn-danger remove-option-btn">Remove</button>');

                    inputGroupText.append(correctOptionRadio);
                    inputGroupText.append(correctOptionLabel);

                    inputGroup.append(optionInput);
                    inputGroup.append(inputGroupText);
                    inputGroup.append(removeOptionBtn);

                    optionRow.append(optionLabel);
                    optionRow.append(inputGroup);

                    optionsContainer.append(optionRow);

                    optionCount++;
                }
            }


            function removeOptionInput() {
                $(this).closest('.option-row').remove();
                optionCount--;
            }

            $('#addOptionBtn').on('click', addOptionInput);

            $(document).on('click', '.remove-option-btn', removeOptionInput);

            function saveEditedQuestion() {
                var questionContent = tinymce.get('questionContent').getContent();
                var formData = $('#editQuestionForm').serialize();

                formData += '&questionContent=' + encodeURIComponent(questionContent);

                $.ajax({
                    type: 'PUT',
                    url: '{{ route('instructor.questions.update', ['question' => $question->id]) }}',
                    data: formData,
                    success: function(response) {
                        console.log('Question updated successfully!');
                        toastr.success('Question updated successfully!');
                        window.location.href =
                            '{{ route('instructor.questions.index', $question->exam_id) }}';
                    },
                    error: function(error) {
                        toastr.error(error.responseJSON.message);
                    }
                });
            }

            $('#saveQuestionBtn').on('click', saveEditedQuestion);
        });
    </script>

@endsection
