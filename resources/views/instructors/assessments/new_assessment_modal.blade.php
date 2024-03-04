<!-- Modal -->
<div class="modal fade" id="addAssessmentModal" tabindex="-1" aria-labelledby="addAssessmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAssessmentModalLabel">Add New Assessment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Assessment Form -->
                <form id="assessmentForm" action="{{ route('instructor.assessments.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course</label>
                        <select id="course_id" class="form-select @error('course_id') is-invalid @enderror" name="course_id">
                            <option value=""></option>
                            <!-- Populate options dynamically from backend -->
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="numQuestions" class="form-label">Number of Questions</label>
                        <select id="numQuestions" class="form-select @error('numQuestions') is-invalid @enderror"
                            name="numQuestions">
                            <option value=""></option>
                            <option value="all" {{ old('numQuestions') == 'all' ? 'selected' : '' }}>All</option>
                            <option value="10" {{ old('numQuestions') == '10' ? 'selected' : '' }}>10</option>
                            <option value="15" {{ old('numQuestions') == '15' ? 'selected' : '' }}>15</option>
                            <option value="20" {{ old('numQuestions') == '20' ? 'selected' : '' }}>20</option>
                            <option value="25" {{ old('numQuestions') == '25' ? 'selected' : '' }}>25</option>
                            <option value="30" {{ old('numQuestions') == '30' ? 'selected' : '' }}>30</option>
                            <option value="35" {{ old('numQuestions') == '35' ? 'selected' : '' }}>35</option>
                            <option value="40" {{ old('numQuestions') == '40' ? 'selected' : '' }}>40</option>
                            <option value="50" {{ old('numQuestions') == '50' ? 'selected' : '' }}>50</option>
                            <option value="60" {{ old('numQuestions') == '60' ? 'selected' : '' }}>60</option>
                            <option value="70" {{ old('numQuestions') == '70' ? 'selected' : '' }}>70</option>
                            <option value="100" {{ old('numQuestions') == '100' ? 'selected' : '' }}>100</option>
                        </select>
                        @error('numQuestions')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="attemptLimit" class="form-label">Attempt Limit</label>
                        <select id="attemptLimit" class="form-select @error('attemptLimit') is-invalid @enderror"
                            name="attemptLimit">
                            <option value=""></option>
                            <option value="unlimited" {{ old('attemptLimit') == 'unlimited' ? 'selected' : '' }}>
                                Unlimited</option>
                            <option value="1" {{ old('attemptLimit') == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('attemptLimit') == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('attemptLimit') == '3' ? 'selected' : '' }}>3</option>
                        </select>
                        @error('attemptLimit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="showResult" class="form-label">Show Result Immediately</label>
                        <select id="showResult" class="form-select @error('showResult') is-invalid @enderror"
                            name="showResult">
                            <option value=""></option>
                            <option value="yes" {{ old('showResult') == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="no" {{ old('showResult') == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('showResult')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <select id="duration" class="form-select @error('duration') is-invalid @enderror"
                            name="duration">
                            <option value=""></option>
                            @foreach ($durations as $durationValue => $durationLabel)
                                <option value="{{ $durationValue }}"
                                    {{ old('duration') == $durationValue ? 'selected' : '' }}>
                                    {{ $durationLabel }}</option>
                            @endforeach
                        </select>
                        @error('duration')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Assessment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
