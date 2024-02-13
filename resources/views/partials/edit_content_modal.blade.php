<!-- Edit Content Modal -->
<div class="modal fade" id="editContentModal{{ $content->id }}" tabindex="1050" role="dialog" aria-labelledby="editContentModalLabel{{ $content->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editContentModalLabel{{ $content->id }}">Edit {{ ucfirst($content->content_type) }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing content -->
                <form id="editContentForm{{ $content->id }}">
                    <div class="form-group">
                        <label for="editedTitle">Title</label>
                        <input type="text" class="form-control" id="editedTitle{{ $content->id }}" name="edited_title" value="{{ $content->title }}" required>
                    </div>
                    <!-- Add more fields as needed -->

                    <button type="button" class="btn btn-primary" onclick="editContent({{ $content->id }})">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
