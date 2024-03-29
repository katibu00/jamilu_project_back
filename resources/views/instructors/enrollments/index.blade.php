@extends('layouts.app')
@section('pageTitle', 'Course Enrollments')

@section('content')
    <section id="content" style="margin-top: -40px;">
        <div class="content-wrap">
            <div class="container">

                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('instructor.enrollments.index') }}" method="get"
                            class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="courseSelect" class="col-form-label">Select Course:</label>
                            </div>
                            <div class="col-auto">
                                <select class="form-select" id="courseSelect" name="course_slug">
                                    <option value="">Select a course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->slug }}"
                                            @if ($selectedCourse && $selectedCourse->slug == $course->slug) selected @endif>{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">View Enrollments</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">

                        @if ($enrollments)
                            <div class="mt-3">
                                <h2>Enrollments for {{ $selectedCourse->title }}</h2>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Progress</th>
                                                <th>Last Seen</th>
                                                <th>Enrollment Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($enrollments as $enrollment)
                                                <tr>
                                                    <td>{{ $enrollment->name }}</td>
                                                    <td>
                                                        <div class="progress" style="height: 25px;">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: {{ $enrollment->progressPercentage }}%;"
                                                                aria-valuenow="{{ $enrollment->progressPercentage }}"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                {{ $enrollment->progressPercentage }}%</div>
                                                        </div>
                                                    </td>
                                                    <td> - </td>

                                                    <td>{{ $enrollment->pivot->created_at->format('M d, Y') }}
                                                        ({{ $enrollment->pivot->created_at->diffForHumans() }})</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button"
                                                                class="btn btn-secondary btn-sm dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="fetchStudentProgress({{ $enrollment->id }}, {{ $selectedCourse->id }})"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#visualizationModal">View
                                                                        Progress</a></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#" onclick="showAssessmentModal({{ $enrollment->id }}, '{{ $enrollment->name }}')" data-bs-toggle="modal" data-bs-target="#assessmentModal">View Assessment Scores</a>
                                                                </li>
                                                                        
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="visualizationModal" tabindex="-1" role="dialog"
                    aria-labelledby="visualizationModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="visualizationModalLabel">Student Progress Visualization</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Loading spinner -->
                                <div id="loadingSpinner" class="text-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <!-- Visualization will be displayed here -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <canvas id="progressChart" width="600" height="400"
                                            style="display: none;"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="timeline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="assessmentModal" tabindex="-1" aria-labelledby="assessmentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assessmentModalLabel">Select Assessment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="assessmentForm">
                                    <input type="hidden" name="studentId" id="studentId">
                                    <div class="mb-3">
                                        <label for="assessmentSelect" class="form-label">Select Assessment:</label>
                                        <select class="form-select" id="assessmentSelect" name="assessmentId">
                                            @if(isset($enrollment))
                                                @foreach ($enrollment->assessments as $assessment)
                                                    <option value="{{ $assessment->id }}">{{ $assessment->title }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="viewAssessmentScore()">Fetch Score</button>
                                </form>
                                <div id="fetchScoreloadingSpinner" class="text-center d-none">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div id="assessmentScore" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                


            </div>
        </div>
    </section>
@endsection

@section('js')

    <!-- Add this script tag to your HTML -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>


function viewAssessmentScore() {
    var studentId = $('#studentId').val();
    var assessmentId = $('#assessmentSelect').val();

    // Show loading spinner
    $('#fetchScoreloadingSpinner').removeClass('d-none');

    // Make AJAX request to fetch assessment score
    $.ajax({
        url: '/enrollments/fetch-assessment-score?userId=' + studentId + '&assessmentId=' + assessmentId,
        method: 'GET',
        data: {
            studentId: studentId,
            assessmentId: assessmentId
        },
        success: function(response) {
            // Hide loading spinner
            $('#fetchScoreloadingSpinner').addClass('d-none');

            // Display assessment score
         


            $('#assessmentScore').empty();

            // Display assessment score details
            var modalBody = $('#assessmentScore');
            modalBody.append('<div class="table-responsive"><table class="table"></table></div>');
            var table = modalBody.find('table');
            var tableHeader = $('<thead><tr><th>Question</th><th>User Answer</th><th>Correct Answer</th><th>Status</th></tr></thead>');
            var tableBody = $('<tbody></tbody>');

            response.responses.forEach(function(response) {
                var status = response.is_correct ? '<span class="text-success">Correct</span>' : '<span class="text-danger">Incorrect</span>';
                tableBody.append('<tr><td>' + response.question.question + '</td><td>' + response.response + '</td><td>' + response.question.correct_answer + '</td><td>' + status + '</td></tr>');
            });

            table.append(tableHeader);
            table.append(tableBody);

            // Show the summary
            var summary = $('<div class="text-center"><p>Total Questions: ' + response.totalQuestions + ' | Total Attempted: ' + response.totalAttempted + ' | Total Correct: ' + response.totalCorrect + ' | Total Failed: ' + response.totalFailed + ' | Remark: ' + response.remark + '</p></div>');
            modalBody.append(summary);





        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
}



        function showAssessmentModal(studentId, studentName) {
            // Update the modal title with the student's name
            $('#assessmentModal').find('.modal-title').text('Assessment Scores - ' + studentName);

            // Update the modal content with the enrollment ID and course ID
            $('#assessmentModal').find('#studentId').val(studentId);

            // Show the modal
            $('#assessmentModal').modal('show');
        }



        function fetchStudentProgress(studentId, courseId) {
            // Show loading spinner and hide chart canvas
            $('#loadingSpinner').show();
            $('#progressChart').hide();


            // Fetch progress data via AJAX
            $.ajax({
                url: '{{ route('student.progress', ['studentId' => ':studentId', 'courseId' => ':courseId']) }}'
                    .replace(':studentId', studentId).replace(':courseId', courseId),
                method: 'GET',

                // success: function(response) {
                //     var progressData = response.data;

                //     // Extract progress data
                //     var completionDates = progressData.progress_data.completion_dates;

                //     // Sort completion dates by lesson ID
                //     var sortedDates = {};
                //     Object.keys(completionDates).sort((a, b) => a - b).forEach(function(key) {
                //         sortedDates[key] = completionDates[key];
                //     });

                //     // Calculate time between lessons in hours
                //     var timeBetweenLessons = [];
                //     var prevDate = null;
                //     Object.values(sortedDates).forEach(function(dateString) {
                //         var currentDate = new Date(dateString);
                //         if (prevDate) {
                //             var hours = (currentDate - prevDate) / (1000 * 60 * 60);
                //             timeBetweenLessons.push(hours);
                //         }
                //         prevDate = currentDate;
                //     });

                //     // Prepare labels for the chart
                //     var lessonLabels = progressData.completed_lessons_data.map(function(lesson) {
                //         return lesson.title;
                //     });

                //     // Get the canvas element
                //     var ctx = document.getElementById('progressChart');

                //     // Check if a Chart instance already exists
                //     if (Chart.instances[0]) {
                //         // Destroy the existing Chart instance
                //         Chart.instances[0].destroy();
                //     }

                //     // Draw the chart
                //     var myChart = new Chart(ctx, {
                //         type: 'line',
                //         data: {
                //             labels: lessonLabels,
                //             datasets: [{
                //                 label: 'Time Between Lessons (hours)',
                //                 data: timeBetweenLessons,
                //                 backgroundColor: 'rgba(75, 192, 192, 0.2)',
                //                 borderColor: 'rgba(75, 192, 192, 1)',
                //                 borderWidth: 1
                //             }]
                //         },
                //         options: {
                //             scales: {
                //                 y: {
                //                     beginAtZero: true,
                //                     title: {
                //                         display: true,
                //                         text: 'Time (hours)'
                //                     }
                //                 },
                //                 x: {
                //                     title: {
                //                         display: true,
                //                         text: 'Lessons'
                //                     }
                //                 }
                //             }
                //         }
                //     });
                //     $('#loadingSpinner').hide();
                //     $('#progressChart').show();
                // },



                success: function(response) {
                    var progressData = response.data.progress_data;
                    var completedLessonsData = response.data.completed_lessons_data;
                    var purchaseDate = new Date(response.data.purchase_date);

                    // Calculate time differences between completed lessons
                    var timeDifferences = [];
                    var completionDates = progressData.completion_dates;
                    var previousDate = purchaseDate;
                    for (var i = 0; i < completedLessonsData.length; i++) {
                        var lessonId = completedLessonsData[i].lesson_id;
                        var completionDate = new Date(completionDates[lessonId]);
                        var timeDifference = (completionDate - previousDate) / (1000 *
                        60); // Difference in minutes
                        timeDifferences.push(timeDifference);
                        previousDate = completionDate;
                    }

                    // Prepare table HTML 
                    var tableHtml =
                        '<table class="table"><thead><tr><th>Lesson Title</th><th>Time to Complete (Minutes)</th></tr></thead><tbody>';
                    for (var i = 0; i < completedLessonsData.length; i++) {
                        var lesson = completedLessonsData[i];
                        var timeToComplete = timeDifferences[i].toFixed(2); // Round to 2 decimal places
                        tableHtml += '<tr><td>' + lesson.title + '</td><td>' + timeToComplete + '</td></tr>';
                    }
                    tableHtml += '</tbody></table>';

                    // Append the table to the modal body
                    $('#visualizationModal .modal-body').html(tableHtml);

                    // Hide loading spinner
                    $('#loadingSpinner').hide();

                    // Show the modal
                    $('#visualizationModal').modal('show');
                },

                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);

                    // Hide loading spinner
                    $('#loadingSpinner').hide();
                },
            });
        }
    </script>

@endsection
