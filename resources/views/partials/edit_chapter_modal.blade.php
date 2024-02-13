<!-- Edit Chapter Modal -->
<div class="modal fade" id="editChapterModal{{ $chapter->id }}" tabindex="1" role="dialog" aria-labelledby="editChapterModalLabel{{ $chapter->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editChapterModalLabel{{ $chapter->id }}">Edit Chapter: {{ $chapter->title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('courses.edit-chapter') }}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="chapterId" value="{{ $chapter->id }}">
              
                    <div class="form-group">
                        <label for="chapterTitle">Title</label>
                        <input type="text" class="form-control" id="chapterTitle" name="chapterTitle" value="{{ $chapter->title }}">
                    </div>
                    <div class="form-group">
                        <label for="chapterDescription">Description</label>
                        <textarea class="form-control tinymce" id="chapterDescription" name="chapterDescription">{{ $chapter->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="chapterOrder">Order Number</label>
                        <input type="number" class="form-control" id="chapterOrder" name="chapterOrder" value="{{ $chapter->order_number }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
