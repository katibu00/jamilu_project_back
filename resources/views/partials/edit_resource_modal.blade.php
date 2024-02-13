<!-- Edit Resource Modal -->
<div class="modal fade" id="editResourceModal{{ $content->id }}" tabindex="-1" role="dialog" aria-labelledby="editResourceModalLabel{{ $content->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editResourceModalLabel{{ $content->id }}">Edit Resource - {{ $content->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your Resource Edit Form Fields -->
                <form action="{{ route('courses.edit-resources') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <input type="hidden" name="contentId" value="{{ $content->id }}">
                    
                    <div class="mb-3">
                        <label for="editedResourceTitle{{ $content->id }}" class="form-label">Resource Title</label>
                        <input type="text" class="form-control" id="editedResourceTitle{{ $content->id }}" name="editedResourceTitle" value="{{ $content->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="editedResourceFile{{ $content->id }}" class="form-label">Resource File</label>
                        <input type="file" class="form-control-file" id="editedResourceFile{{ $content->id }}" name="editedResourceFile" name="editedResourceFile">
                    </div>

                    <div class="mb-3">
                        <label for="editedResourceOrder{{ $content->id }}" class="form-label">Order Number</label>
                        <input type="number" class="form-control" id="editedResourceOrder{{ $content->id }}" name="editedResourceOrder" name="editedResourceOrder" value="{{ $content->order_number }}" required>
                    </div>

                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
