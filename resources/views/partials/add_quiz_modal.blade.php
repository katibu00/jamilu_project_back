<!-- Add Quiz Modal -->
<div class="modal fade" id="addQuizModal{{ $chapter->id }}" tabindex="1" role="dialog" aria-labelledby="addQuizModalLabel{{ $chapter->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQuizModalLabel{{ $chapter->id }}">Add Quiz to {{ $chapter->title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding a quiz -->
                <form action="{{ route('courses.add-quiz') }}" method="post">
                    @csrf
                    <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                    <div class="form-group">
                        <label for="quizTitle">Quiz Title</label>
                        <input type="text" class="form-control" id="quizTitle" name="quiz_title" required>
                    </div>
                    <div class="form-group">
                        <label for="quizOrder">Order Number</label>
                        <input type="number" class="form-control" id="quizOrder" name="quiz_order" required>
                    </div>
                    <div class="form-group">
                        <label for="quizId">Select Quiz</label>
                        <select class="form-control" id="quizId" name="quiz_id" required>
                            <option value=""></option>
                            @foreach ($quizzes as $quiz)
                            <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                            @endforeach
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-info">Add Quiz</button>
                </form>
            </div>
        </div>
    </div>
</div>

