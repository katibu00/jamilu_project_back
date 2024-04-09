<!-- Add Lesson Modal -->
<div class="modal fade" id="addLessonModal{{ $chapter->id }}" tabindex="1050" role="dialog" aria-labelledby="addLessonModalLabel{{ $chapter->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLessonModalLabel{{ $chapter->id }}">Add Lesson to {{ $chapter->title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding a lesson -->
                <form id="addLessonForm{{ $chapter->id }}" action="{{ route('courses.add-lesson') }}" method="POST">
                    @csrf
                    <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                    <div class="form-group">
                        <label for="lessonTitle">Lesson Title</label>
                        <input type="text" class="form-control" id="lessonTitle{{ $chapter->id }}" name="lesson_title" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration{{ $chapter->id }}" name="duration" required>
                    </div>
                    <div class="form-group">
                        <label for="lessonOrder">Order Number</label>
                        <input type="number" class="form-control" id="lessonOrder{{ $chapter->id }}" name="lesson_order" required>
                    </div>

                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-success">Add Lesson</button>
                </form>
            </div>
        </div>
    </div>
</div>
