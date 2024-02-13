@extends('layouts.app')
@section('pageTitle', 'Questions')
@section('css')
    <link href="/toastr/toastr.min.css" rel="stylesheet">
@endsection
@section('content')

<section id="content" style="margin-top: -40px;">
    <div class="content-wrap">
            <div class="container">

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Questions List</h5>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
                           + New Question</a>
                    </div>
                    <div class="card-body">
                        @if (count($questions) > 0)
                            @include('instructors.assessments.questions_table')
                        @else
                            <p>No questions found.</p>
                        @endif
                    </div>
                </div>
                @include('instructors.assessments.new_question_modal')

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
            var optionCount = 2;


            $(document).on('click', '#addQuestionModal input[name="correct_option"]', function() {
                // Your logic for handling the click event on radio buttons
                console.log('Radio button clicked');
            });


            function addOptionInput() {
                if (optionCount <= 5) {
                    var optionsContainer = $('#optionsContainer');

                    var optionRow = $('<div class="mb-3 option-row"></div>');
                    var optionLabel = $('<label class="form-label">Option ' + optionCount + '</label>');
                    var inputGroup = $('<div class="input-group"></div>');
                    var optionInput = $('<input type="text" class="form-control" name="option[]" required>');
                    var inputGroupText = $('<div class="input-group-text"></div>');
                    var correctOptionCheckbox = $('<input type="radio" name="correct_option" value="' +
                        optionCount + '" required>');
                    var correctOptionLabel = $('<label class="form-check-label ms-2">Correct</label>');
                    var removeOptionBtn = $(
                        '<button type="button" class="btn btn-danger remove-option-btn">Remove</button>');

                    inputGroupText.append(correctOptionCheckbox);
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

            // Function to handle renumbering of options
            function renumberOptions() {
                $('.option-row').each(function(index) {
                    $(this).find('.form-label').text('Option ' + (index + 1));
                });
            }

            // Function to handle removal of an option
            function removeOptionInput() {
                $(this).closest('.option-row').remove();
                optionCount--;
                renumberOptions();
            }

            // Event listener to add option on button click
            $('#addOptionBtn').on('click', addOptionInput);

            // Event delegation for the click events on radio buttons
            $(document).on('click', 'input[name="correct_option"]', function() {
                // Your logic for handling the click event on radio buttons
                console.log('Radio button clicked');
            });

            // Event listener to remove option on button click
            $(document).on('click', '.remove-option-btn', removeOptionInput);
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {
            function saveQuestion() {
                var questionContent = tinymce.get('questionContent').getContent();
                var formData = $('#questionForm').serialize();
                formData += '&questionContent=' + encodeURIComponent(questionContent);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('instructor.questions.store') }}',
                    data: formData,
                    success: function(response) {
                        // $('#addQuestionModal').modal('hide');
                        $('#addQuestionModal').find('.close').click();
                        $('#addQuestionModal button[data-bs-dismiss="modal"]').trigger('click');

                        $('#questionForm')[0].reset();
                        $('.table').load(location.href + ' .table');

                        tinymce.get('questionContent').setContent('');
                        toastr.success('Question saved successfully!');

                    },
                    error: function(error) {
                        console.error('Failed to save question:', error.responseJSON);
                        toastr.error(error.responseJSON.message);
                    }
                });
            }

            $('#saveQuestionBtn').on('click', saveQuestion);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteQuestion(questionId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this question!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route('instructor.questions.destroy', ['question' => '__questionId__']) }}'
                            .replace('__questionId__', questionId),
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('.table').load(location.href + ' .table');
                            Swal.fire('Deleted!', 'The question has been deleted.', 'success');

                        },
                        error: function(error) {
                            Swal.fire('Error!', 'Failed to delete the question.', 'error');
                        }
                    });
                }
            });
        }
    </script>





@endsection
