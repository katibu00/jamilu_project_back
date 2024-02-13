@extends('layouts.app')
@section('pageTitle', 'Video Manager')

@section('content')
<section id="content" style="margin-top: -40px;">
    <div class="content-wrap">
        <div class="container">

            <!-- Video Manager Card -->
            <div class="card">
                <div class="card-header">
                    <h2>Video Manager</h2>
                </div>

                @php $firstLesson = $lessons->first();   @endphp
                <video controls autoplay>
                    <source src="{{ asset($firstLesson->content_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <div class="card-body">
                    <!-- List of Chapters with Video Lessons -->
                    @foreach($chapters as $chapter)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3>{{ $chapter->title }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Uploaded</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($chapter->contents as $content)
                                                <tr>
                                                    <td>{{ $content->title }}</td>
                                                    <td class="{{ $content->content_path ? 'text-success' : 'text-danger' }}">{{ $content->content_path ? 'Uploaded' : 'Not Uploaded' }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="{{ route('videos.create') }}?lesson_id={{ $content->id }}" class="dropdown-item upload-video">
                                                                        <i class="fas fa-video"></i> Upload Video
                                                                    </a>
                                                                </li>
                                                                
                                                                <!-- Add other action items here -->
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<style>
    .card-footer, .progress {
        display: none;
    }
</style>

{{-- <!-- New Upload Modal -->
<div class="modal" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload a Video File for <span id="lessonTitle"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="lessonIdInput" name="lesson_id">
                    <div id="upload-container" class="text-center">
                        <button id="browseFile" class="btn btn-primary">Browse File</button>
                    </div>
                    <div class="progress mt-3" style="height: 25px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                    </div>

                    <div id="uploadMessage" class="mt-3"></div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@section('js')
<script>
    $(document).ready(function() {
        // Event listener for the "Upload Video" action item
        $('.upload-video').on('click', function() {
            let lessonId = $(this).data('lesson-id');
            let lessonTitle = $(this).data('lesson-title');
            
            // Set the lesson title in the modal header
            $('#lessonTitle').text(lessonTitle);
            $('#lessonIdInput').val(lessonId);

        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script type="text/javascript">
    let browseFile = $('#browseFile');
    let resumable = new Resumable({
        target: '{{ route('files.upload.large') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['mp4'],
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('.card-footer').show();
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>

@endsection
