<!-- Add Resource Modal -->
<div class="modal fade" id="addResourceModal{{ $chapter->id }}" tabindex="1" role="dialog" aria-labelledby="addResourceModalLabel{{ $chapter->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addResourceModalLabel{{ $chapter->id }}">Add Resource to {{ $chapter->title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding a resource -->
                <form action="{{ route('courses.add-resources') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                    <div class="form-group">
                        <label for="resourceTitle">Resource Title</label>
                        <input type="text" class="form-control" id="resourceTitle" name="resource_title" required>
                    </div>
                    <div class="form-group">
                        <label for="resourceFile">Resource File</label>
                        <input type="file" class="form-control-file" id="resourceFile" name="resource_file" required>
                    </div>
                    <div class="form-group">
                        <label for="resourceOrder">Order Number</label>
                        <input type="number" class="form-control" id="resourceOrder" name="resource_order" required>
                    </div>

                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-warning">Add Resource</button>
                </form>
            </div>
        </div>
    </div>
</div>