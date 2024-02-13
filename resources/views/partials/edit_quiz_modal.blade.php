<!-- Edit Quiz Modal -->
<div class="modal fade" id="editQuizModal{{ $content->id }}" tabindex="-1" role="dialog" aria-labelledby="editQuizModalLabel{{ $content->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editQuizModalLabel{{ $content->id }}">Edit Quiz - {{ $content->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your Quiz Edit Form Fields -->
                <form action="{{ route('courses.edit-quiz') }}" method="post">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->

                    <!-- Add your quiz edit form fields here -->
                    <input type="hidden" name="contentId" value="{{ $content->id }}">
                    <div class="mb-3">
                        <label for="editedQuizTitle{{ $content->id }}" class="form-label">Quiz Title</label>
                        <input type="text" class="form-control" id="editedQuizTitle{{ $content->id }}" name="editedTitle" value="{{ $content->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="editedQuizOrder{{ $content->id }}" class="form-label">Order Number</label>
                        <input type="number" class="form-control" id="editedQuizOrder{{ $content->id }}" name="editedOrder" value="{{ $content->order_number }}" required>
                    </div>

                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
