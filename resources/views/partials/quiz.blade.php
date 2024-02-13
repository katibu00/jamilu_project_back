<!-- resources/views/partials/quiz.blade.php -->

<div class="card mt-2">
    <div class="card-header">
        <input type="hidden" name="chapters[{{ $chapterNumber }}][quizzes][{{ $quiz->order_number }}][id]" value="{{ $quiz->id }}">
        <input type="text" name="chapters[{{ $chapterNumber }}][quizzes][{{ $quiz->order_number }}][title]" class="form-control style-white form-control-sm mb-2" placeholder="Quiz Title" value="{{ $quiz->title }}" />
        <input type="number" name="chapters[{{ $chapterNumber }}][quizzes][{{ $quiz->order_number }}][order]" class="form-control style-white form-control-sm mb-2" placeholder="Order Number" value="{{ $quiz->order_number }}" />
        <select name="chapters[{{ $chapterNumber }}][quizzes][{{ $quiz->order_number }}][quiz_id]" class="single-select nice-select form-select style-white mb-2">
            <option value="1" {{ $quiz->quiz_id == 1 ? 'selected' : '' }}>Quiz 1</option>
            <option value="2" {{ $quiz->quiz_id == 2 ? 'selected' : '' }}>Quiz 2</option>
            <!-- Add more options as needed -->
        </select>
        <div class="float-right">
            <button type="button" class="btn btn-danger btn-sm" data-type="deleteQuiz">Delete Quiz</button>
        </div>
    </div>
</div>
