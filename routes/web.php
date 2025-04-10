<?php

use App\Http\Controllers\AdminAssessmentController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CourseContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseReviewController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PurchaseCourseController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TechCareerController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [PagesController::class, 'home'])->name('homepage');


Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login']);
    
    // Registration Routes (assuming you already have these)
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    
    // Password Reset Routes
    Route::get('/forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/forgot-password', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/reset-password', 'Auth\ResetPasswordController@reset')->name('password.update');
    
    // Social Login Routes
    Route::get('/auth/google', [AuthenticationController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthenticationController::class, 'handleGoogleCallback']);
    
    Route::get('/auth/facebook', [AuthenticationController::class, 'redirectToFacebook'])->name('auth.facebook');
    Route::get('/auth/facebook/callback', [AuthenticationController::class, 'handleFacebookCallback']);
    
    Route::get('/auth/linkedin', [AuthenticationController::class, 'redirectToLinkedin'])->name('auth.linkedin');
    Route::get('/auth/linkedin/callback', [AuthenticationController::class, 'handleLinkedinCallback']);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Logout Route
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    
    // Dashboard Routes based on roles
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    });
    
    Route::middleware('role:instructor')->group(function () {
        Route::get('/instructor/dashboard', [HomeController::class, 'instructor'])->name('instructor.dashboard');
    });
    
    Route::middleware('role:student')->group(function () {
        Route::get('/student/dashboard', [HomeController::class, 'student'])->name('student.dashboard');
    });
});

Route::get('/home', function () {
    if (auth()->user()->role == 'instructor') {
        return redirect()->route('home.instructor');
    }
    if (auth()->user()->role == 'student') {
        return redirect()->route('home.student');
    }
    if (auth()->user()->role == 'admin') {
        return redirect()->route('home.admin');
    }
});





Route::get('/get-into-tech', [TechCareerController::class, 'showForm'])->name('get-into-tech');
Route::post('/get-into-tech', [TechCareerController::class, 'submitForm'])->name('submit-tech-form');
Route::get('/thank-you', [TechCareerController::class, 'thankYou'])->name('thank-you');


// routes/web.php

// Main careers listing page
Route::get('/careers', [PagesController::class, 'careers'])->name('careers.index');

// Web development career page
Route::get('/careers/web-development', [PagesController::class, 'webDevelopment'])->name('careers.web-development');





// Instructor Profile Completion Route
Route::get('/instructor/profile/complete', function () {
    return view('instructor.profile.complete');
})->middleware(['auth', 'role:instructor'])->name('instructor.profile.complete');

Route::get('/admin/home', [HomeController::class, 'admin'])->name('home.admin');


Route::get('/register', [AuthenticationController::class, 'registerIndex'])->name('register')->middleware('guest');
Route::post('/register', [AuthenticationController::class, 'register']);

Route::get('/login', [AuthenticationController::class, 'loginIndex'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'instructor', 'middleware' => ['auth']], function () {

    Route::get('/home', [HomeController::class, 'instructor'])->name('home.instructor');

    Route::get('/profile', [InstructorsController::class, 'profileIndex'])->name('instructor.profile.index');

    Route::post('/profile', [InstructorsController::class, 'profileStore'])->name('instructor.profile.update');
});

Route::group(['prefix' => 'student', 'middleware' => ['auth']], function () {

    Route::get('/home', [HomeController::class, 'student'])->name('home.student');

    Route::get('/courses', [StudentController::class, 'courses'])->name('student.courses');

    Route::get('/courses/{slug}', [StudentController::class, 'class'])->name('student.course.show');

    Route::get('/course/{slug}/next-lesson', [StudentController::class, 'nextLesson'])->name('course.next.lesson');

    Route::get('/courses/{slug}/lessons/{lessonId}', [StudentController::class, 'showLesson'])->name('courses.lessons.showLesson');

    Route::post('/save-note', [StudentController::class, 'saveNote'])->name('save-note');
    Route::get('/fetch-notes', [StudentController::class, 'fetchNotes'])->name('fetch-notes');

    Route::delete('/delete-note', [StudentController::class, 'deleteNote'])->name('delete-note');

    Route::post('/submit-review', [StudentController::class, 'submitReview'])->name('submit-review');

    Route::get('/fetch-reviews', [StudentController::class, 'fetchReviews'])->name('fetch-reviews');

    Route::get('/fetch-assessment-score', [StudentController::class, 'fetchScore'])->name('fetch-score');

});

Route::post('/discussions', [DiscussionController::class, 'store'])->name('discussions.store');
Route::get('/discussions/{course_id}', [DiscussionController::class, 'index'])->name('discussions.index');
Route::post('/comments', [DiscussionController::class, 'commentStore'])->name('comments.store');

Route::get('/course/{slug}', [PagesController::class, 'courseDetail'])->name('course.detail');
Route::get('/instructor/{id}', 'InstructorController@detail')->name('instructor.detail');
Route::get('/course/{slug}/buy', [PagesController::class, 'buy'])->name('course.buy');
Route::get('/course/{slug}/buy/process', [PagesController::class, 'buyProcess'])->name('course.buy.process');

Route::group(['prefix' => 'settings', 'middleware' => ['admin']], function () {

    Route::get('/monnify_api_key', [SettingsController::class, 'monnifyKeys'])->name('monnify_api_key');
    Route::post('/monnify_api_key', [SettingsController::class, 'saveMonnify']);

    Route::get('/paystack_api_key', [SettingsController::class, 'paystackKeys'])->name('paystack_api_key');
    Route::post('/paystack_api_key', [SettingsController::class, 'savePaystack']);
});





Route::group(['prefix' => 'courses', 'middleware' => ['auth']], function () {

    Route::get('/', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/{course}/update', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/{course}/delete', [CourseController::class, 'destroy'])->name('courses.destroy');

    Route::get('courses/{course}/manage-content', [CourseContentController::class, 'manageContent'])->name('courses.manage-content');

    Route::post('courses/{course}/save-content', [CourseContentController::class, 'saveContent'])->name('courses.save-content');

    Route::get('/content/{id}/edit', [CourseContentController::class, 'edit'])->name('courses.content.edit');
    Route::put('/{course}/update-content', [CourseContentController::class, 'updateContent'])->name('courses.update-content');

    Route::get('/{course}/manage-lessons', [VideoController::class, 'index'])->name('courses.manage-lessons');

    //////////////////////////

    // routes/web.php

    Route::post('/courses/add-lesson', [CourseContentController::class, 'addLesson'])->name('courses.add-lesson');

    Route::post('/courses/add-quiz', [CourseContentController::class, 'addQuiz'])->name('courses.add-quiz');
    Route::post('/courses/add-resources', [CourseContentController::class, 'addResources'])->name('courses.add-resources');

    Route::delete('/courses/delete-chapter', 'CourseController@deleteChapter')->name('courses.delete-chapter');

    Route::get('/courses/delete-content', [CourseContentController::class, 'deleteContent'])->name('courses.delete-content');

    Route::get('/courses/get-content', 'CourseController@getContent')->name('courses.get-content');

    Route::put('/courses/edit-lesson', [CourseContentController::class, 'updateLesson'])->name('courses.edit-lesson');

    Route::put('/courses/edit-quiz', [CourseContentController::class, 'updateQuiz'])->name('courses.edit-quiz');
    Route::put('/courses/edit-resources', [CourseContentController::class, 'updateResource'])->name('courses.edit-resources');
    Route::put('/courses/edit-chapter', [CourseContentController::class, 'updateChapter'])->name('courses.edit-chapter');
});

Route::group(['prefix' => 'assessments', 'middleware' => ['auth']], function () {

    Route::get('/assessments', [AdminAssessmentController::class, 'manageIndex'])->name('instructor.assessments.index');
    Route::post('/assessments', [AdminAssessmentController::class, 'storeExam'])->name('instructor.assessments.store');
    Route::get('/questions', [AdminAssessmentController::class, 'showQuestionsPage'])->name('instructor.questions.index');
    Route::post('/questions/store', [AdminAssessmentController::class, 'storeQuestions'])->name('instructor.questions.store');
    Route::delete('/questions/{question}', [AdminAssessmentController::class, 'destroyQuestions'])->name('instructor.questions.destroy');
    Route::get('/questions/{question}/edit', [AdminAssessmentController::class, 'editQuestions'])->name('instructor.questions.edit');
    Route::put('/questions/{question}', [AdminAssessmentController::class, 'updateQuestion'])->name('instructor.questions.update');
    Route::post('/cbt/schedule/save', [AdminCBTController::class, 'saveSchedule'])->name('instructor.schedule.save');
    Route::get('/cbt/schedule/get', [AdminCBTController::class, 'getSchedule'])->name('instructor.schedule.get');

    Route::get('cbt/assessments/details', [AdminAssessmentController::class, 'getExamDetails'])->name('instructor.assessments.details');
    Route::post('/cbt/assessments/delete', [AdminCBTController::class, 'deleteExam'])->name('instructor.assessments.delete');

    Route::get('/exams/{examId}/edit', [AdminAssessmentController::class, 'editExam'])->name('instructor.exams.edit');
    Route::put('/assessments/{examId}', [AdminAssessmentController::class, 'updateExam'])->name('instructor.assessments.update');

    Route::get('/attempts', [ExamAttemptsController::class, 'index'])->name('instructor.attempts.index');
    Route::post('/attempts', [ExamAttemptsController::class, 'fetchRecords'])->name('instructor.attempts.fetch_records');
    Route::get('/cbt/attempts/show/{examId}/{studentId}', [YourControllerNameHere::class, 'show'])->name('instructor.attempts.show');

});

Route::get('/start-assessment/{assessmentId}', [StudentController::class, 'startQuiz'])->name('start.assessment')->middleware('auth');
Route::post('/submit-quiz', [StudentController::class, 'submitExam'])->middleware('auth');

Route::group(['prefix' => 'videos', 'middleware' => ['auth']], function () {

    Route::post('/upload', [VideoController::class, 'upload'])->name('videos.upload');
    Route::delete('/{id}', [VideoController::class, 'delete'])->name('videos.delete');

});
Route::post('file-upload/upload-large-files', [VideoController::class, 'uploadLargeFiles'])->name('files.upload.large');
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');

Route::post('/verify-payment', [PurchaseCourseController::class, 'purchaseViaPaystack'])->name('verify-payment');


Route::group(['prefix' => 'enrollments', 'middleware' => ['auth']], function () {
    Route::get('/', [EnrollmentsController::class, 'index'])->name('instructor.enrollments.index');

    Route::get('/student-progress/{studentId}/{courseId}', [EnrollmentsController::class, 'fetchStudentProgress'])->name('student.progress');

    Route::get('/fetch-assessment-score', [EnrollmentsController::class, 'fetchAssessmentScore'])->name('fetch.assessment.score');


});

Route::group(['prefix' => 'discussions', 'middleware' => ['auth']], function () {
    Route::get('/', [DiscussionController::class, 'instructorIndex'])->name('instructor.discussions.index');

    Route::get('/{discussion}/delete', [DiscussionController::class, 'delete'])->name('discussions.delete');

});
Route::group(['prefix' => 'reviews', 'middleware' => ['auth']], function () {
    Route::get('/', [CourseReviewController::class, 'index'])->name('instructor.reviews.index');

    Route::get('/{review}/toggle-publish', [CourseReviewController::class, 'togglePublish'])->name('reviews.toggle-publish');

});

