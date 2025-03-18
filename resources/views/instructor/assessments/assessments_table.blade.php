@if ($assessments->isEmpty())
<div class="alert alert-info">
    <p><strong>No assessments Created Yet.</strong></p>
    <p>It seems your school has not created any assessments at the moment.</p>
    <p>You have the opportunity to get started:</p>
    <ul>
        <li>Click the "New Assessment" button above to create a new assessment.</li>
        <li>Contact the school administration if you have questions about upcoming assessments.</li>
        <li>Explore other sections of our platform to enhance your experience.</li>
    </ul>
</div>
@else
<table class="table assessments_table">
    <thead>
        <tr>
            <th style="width: 3%">S/N</th>
            <th>Assessment Name</th>
            <th>Status</th>
            {{-- <th>Questions</th> --}}
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($assessments as $key => $assessment)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $assessment->title }}</td>
                <td>
                    @if ($assessment->start_datetime && $assessment->end_datetime)
                        @php
                            $now = now();
                            $startDateTime = \Carbon\Carbon::parse($assessment->start_datetime);
                            $endDateTime = \Carbon\Carbon::parse($assessment->end_datetime);
                            $daysUntilStart = $now->diffInDays($startDateTime, false);
                            $daysUntilEnd = $now->diffInDays($endDateTime, false);
                        @endphp
                        @if ($daysUntilStart > 0)
                            <span class="badge bg-primary">Starts in {{ $daysUntilStart }} days</span>
                        @elseif ($daysUntilEnd > 0)
                            <span class="badge bg-success">Ends in {{ $daysUntilEnd }} days</span>
                        @elseif ($daysUntilEnd === 0)
                            <span class="badge bg-warning">Ends today</span>
                        @else
                            <span class="badge bg-danger">Expired</span>
                        @endif
                    @else
                        <span class="badlge bg-;secondary">Not Scheduled</span>
                    @endif
                </td>
                
                {{-- <td>{{ $assessment->questions->count() }}</td> --}}
                
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item details-btn" href="#" data-exam-id="{{ $assessment->id }}">Details</a>
                            </li>
                            
                            <li>
                                <a class="dropdown-item" href="{{ route('instructor.questions.index') }}?examId={{ $assessment->id }}">Questions</a>
                            </li>
                            
                            <li>
                                <a class="dropdown-item schedule-btn" href="#"
                                    data-exam-id="{{ $assessment->id }}">Schedule</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('instructor.exams.edit', ['examId' => $assessment->id]) }}">Edit</a>
                            </li>
                            <li><a class="dropdown-item delete-exam" href="#" data-exam-id="{{ $assessment->id }}">Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
