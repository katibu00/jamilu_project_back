<!-- Edit Lesson Modal -->
<div class="modal fade" id="editLessonModal{{ $content->id }}" tabindex="-1" role="dialog" aria-labelledby="editLessonModalLabel{{ $content->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLessonModalLabel{{ $content->id }}">Edit Lesson - {{ $content->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your Lesson Edit Form Fields -->
                <form id="editLessonForm{{ $content->id }}" action="{{ route('courses.edit-lesson') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="contentId" value="{{ $content->id }}">
                    <div class="mb-3">
                        <label for="editedLessonTitle{{ $content->id }}" class="form-label">Lesson Title</label>
                        <input type="text" class="form-control" id="editedLessonTitle{{ $content->id }}" name="editedTitle" value="{{ $content->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="editedLessonDuration{{ $content->id }}" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="editedLessonDuration{{ $content->id }}" name="editedDuration" value="{{ $content->duration }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="editedLessonOrder{{ $content->id }}" class="form-label">Order Number</label>
                        <input type="number" class="form-control" id="editedLessonOrder{{ $content->id }}" name="editedOrder" value="{{ $content->order_number }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
