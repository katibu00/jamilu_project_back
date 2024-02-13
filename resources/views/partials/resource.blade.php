<!-- resources/views/partials/resource.blade.php -->

<div class="card mt-2">
    <div class="card-header">
        <input type="hidden" name="chapters[{{ $chapterNumber }}][resources][{{ $resource->order_number }}][id]" value="{{ $resource->id }}">
        <input type="text" name="chapters[{{ $chapterNumber }}][resources][{{ $resource->order_number }}][title]" class="form-control form-control-sm style-white mb-2" placeholder="Resource Title" value="{{ $resource->title }}" />
        <input type="file" name="chapters[{{ $chapterNumber }}][resources][{{ $resource->order_number }}][file]" class="form-control-file style-white mb-2" />
        <input type="number" name="chapters[{{ $chapterNumber }}][resources][{{ $resource->order_number }}][order]" class="form-control form-control-sm style-white mb-2" placeholder="Order Number" value="{{ $resource->order_number }}" />
        <div class="float-right">
            <button type="button" class="btn btn-danger btn-sm" data-type="deleteResource">Delete Resource</button>
        </div>
    </div>
</div>
