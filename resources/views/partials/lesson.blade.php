<!-- resources/views/partials/lesson.blade.php -->

<div class="card mt-2">
    <div class="card-header">
        <input type="hidden" name="chapters[{{ $chapterNumber }}][lessons][{{ $lesson->order_number }}][id]" value="{{ $lesson->id }}">
        <input type="text" name="chapters[{{ $chapterNumber }}][lessons][{{ $lesson->order_number }}][title]" class="form-control form-control-sm style-white mb-2" placeholder="Lesson Title" value="{{ $lesson->title }}" />
        <input type="text" name="chapters[{{ $chapterNumber }}][lessons][{{ $lesson->order_number }}][video_url]" class="form-control form-control-sm style-white mb-2" placeholder="Video URL" value="{{ $lesson->content_path }}" />
        <input type="text" name="chapters[{{ $chapterNumber }}][lessons][{{ $lesson->order_number }}][duration]" class="form-control form-control-sm style-white mb-2" placeholder="Duration" value="{{ $lesson->duration }}" />
        <input type="number" name="chapters[{{ $chapterNumber }}][lessons][{{ $lesson->order_number }}][order]" class="form-control form-control-sm style-white mb-2" placeholder="Order Number" value="{{ $lesson->order_number }}" />
        <div class="float-right">
            <button type="button" class="btn btn-danger btn-sm" data-type="deleteLesson">Delete Lesson</button>
        </div>
    </div>
</div>
