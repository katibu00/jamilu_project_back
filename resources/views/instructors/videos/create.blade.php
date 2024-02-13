@extends('layouts.app')
@section('pageTitle', 'Upload Video')
@section('content')

<style>
    .card-footer, .progress {
        display: none;
    }
</style>


<div class="container pt-4 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Upload File for Lesson: {{ $lesson->title }}</h5>
                </div>

                <div class="card-body">
                    <div id="upload-container" class="text-center">
                        <button id="browseFile" class="btn btn-primary">Browse File</button>
                    </div>
                    <input type="hidden" id="lessonIdInput" name="lesson_id" value="{{ $lesson->id }}">

                    <div class="progress mt-3" style="height: 25px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                    </div>
                </div>

                <div class="card-footer p-4" >
                    <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script type="text/javascript">
    let browseFile = $('#browseFile');
    let lessonIdInput = $('#lessonIdInput'); // Select the lesson ID input field

    let resumable = new Resumable({
        target: '{{ route('files.upload.large') }}',
        query: {
            _token: '{{ csrf_token() }}',
            lesson_id: lessonIdInput.val() // Include the lesson ID in the request parameters
        },
        fileType: ['mp4'],
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function(file) { // trigger when file picked
        showProgress();
        // Update the lesson ID in the Resumable.js request parameters
        resumable.opts.query.lesson_id = lessonIdInput.val();
        resumable.upload(); // to actually start uploading.
    });

    resumable.on('fileProgress', function(file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
        response = JSON.parse(response);
        $('#videoPreview').attr('src', '{{ asset('storage/') }}' + response.filename);
        $('.card-footer').show();
    });

    resumable.on('fileError', function(file, response) { // trigger when there is any error
        alert('File uploading error.');
    });

    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`);
        progress.find('.progress-bar').html(`${value}%`);
    }

    function hideProgress() {
        progress.hide();
    }
</script>

@endsection
