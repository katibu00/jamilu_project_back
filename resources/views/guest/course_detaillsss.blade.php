<!-- resources/views/guest/course_detail.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - Koyify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800 pb-24">
    <!-- Navigation -->
    <nav class="bg-indigo-600 text-white p-4 flex justify-between items-center sticky top-0 z-30 shadow-md">
        <div class="flex items-center">
            <button class="mr-3 mobile-tap-target" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i>
            </button>
            <h1 class="font-bold text-lg truncate">TechNaija</h1>
        </div>
        <div class="flex">
            <button class="mr-4 mobile-tap-target" onclick="shareContent()">
                <i class="fas fa-share-alt"></i>
            </button>
            <button class="mobile-tap-target" id="bookmarkButton" onclick="toggleBookmark()">
                <i class="far fa-bookmark" id="bookmarkIcon"></i>
            </button>
        </div>
    </nav>

    <!-- Course Header -->
    <div class="relative">
        <!-- Featured Video Thumbnail with Play Button -->
        <div class="relative">
            @if($course->thumbnail)
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-56 object-cover sm:h-64">
            @else
                <img src="/api/placeholder/800/450" alt="{{ $course->title }}" class="w-full h-56 object-cover sm:h-64">
            @endif
            
            @if($course->featured_video)
            <div class="absolute inset-0 flex items-center justify-center">
                <button class="bg-white bg-opacity-80 rounded-full p-4 shadow-lg mobile-tap-target" onclick="playVideo('{{ $course->featured_video }}')">
                    <i class="fas fa-play text-indigo-600 text-xl"></i>
                </button>
            </div>
            <div class="absolute bottom-0 right-0 bg-black bg-opacity-70 text-white text-xs px-2 py-1 m-2 rounded">
                {{ floor($course->duration_minutes / 60) }}:{{ sprintf('%02d', $course->duration_minutes % 60) }}
            </div>
            @endif
        </div>
        
        <!-- Course Title Section -->
        <div class="p-4 bg-white border-b">
            <h1 class="text-xl font-bold">{{ $course->title }}</h1>
            <div class="flex items-center mt-2 text-sm">
                <div class="flex text-yellow-400">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= floor($course->instructor->rating))
                            <i class="fas fa-star"></i>
                        @elseif($i - 0.5 <= $course->instructor->rating)
                            <i class="fas fa-star-half-alt"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </div>
                <span class="ml-1 text-gray-600">{{ number_format($course->instructor->rating, 1) }} ({{ $course->instructor->total_students }} students)</span>
                <span class="mx-2 text-gray-400">|</span>
                <span class="text-gray-600">{{ $course->instructor->total_courses }} courses</span>
            </div>
            <div class="mt-2 text-sm text-gray-600 flex flex-wrap">
                <span class="mr-4 mb-1"><i class="far fa-clock mr-1"></i> {{ floor($totalDuration / 60) }} hours {{ $totalDuration % 60 }} min</span>
                <span class="mr-4 mb-1"><i class="fas fa-signal mr-1"></i> {{ ucfirst($course->level) }}</span>
                <span class="mb-1"><i class="fas fa-closed-captioning mr-1"></i> {{ ucfirst($course->language) }}</span>
            </div>
        </div>
    </div>

    <!-- Course Info Tabs -->
    <div class="bg-white mb-2 sticky top-[72px] z-20 shadow-sm">
        <div class="flex border-b">
            <button class="flex-1 py-3 font-medium text-indigo-600 border-b-2 border-indigo-600 tab-button active" data-tab="about">
                About
            </button>
            <button class="flex-1 py-3 font-medium text-gray-500 tab-button" data-tab="chapters">
                Chapters
            </button>
            <button class="flex-1 py-3 font-medium text-gray-500 tab-button" data-tab="reviews">
                Reviews
            </button>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="course-content">
        <!-- About Tab Content -->
        <div class="p-4 tab-content active" id="about-content">
            <!-- Course Description -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Course Description</h2>
                <div class="text-gray-700 text-sm course-description">
                    <p>{{ $course->short_description }}</p>
                    <div id="full-description" class="mt-2 collapse-text" style="display: none;">
                        {!! $course->description !!}
                    </div>
                    <button class="text-indigo-600 text-sm mt-2 font-medium" id="read-more-btn" onclick="toggleDescription()">Read more</button>
                </div>
            </div>

            <!-- What You'll Learn -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">What You'll Learn</h2>
                <div class="grid grid-cols-1 gap-3">
                    @if($course->tags)
                        @php $tags = json_decode($course->tags, true) @endphp
                        @foreach($tags as $tag)
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <p class="text-sm text-gray-700">{{ $tag }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <p class="text-sm text-gray-700">Master {{ $course->title }} from the ground up</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <p class="text-sm text-gray-700">Understand core concepts in {{ ucfirst($course->language) }}</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Instructor Info -->
            <div class="mb-6 bg-white rounded-lg p-4 shadow-sm">
                <h2 class="text-lg font-semibold mb-3">Your Instructor</h2>
                <div class="flex items-center">
                    @if($course->instructor && $course->instructor->profile_image)
                    <img src="{{ asset('storage/' . $course->instructor->user->profile_image) }}" alt="{{ $course->instructor->user->name }}" class="w-12 h-12 rounded-full object-cover">
                    @else
                        {{-- <img src="/api/placeholder/100/100" alt="{{ $course->instructor->user->name }}" class="w-12 h-12 rounded-full object-cover"> --}}
                    @endif
                    <div class="ml-3">
                        {{-- <h3 class="font-medium">{{ $course->instructor->user->name }}</h3> --}}
                        <p class="text-sm text-gray-600">{{ $course->instructor->qualification ?? 'Instructor' }}</p>
                    </div>
                </div>
                <div class="mt-3 text-sm text-gray-700">
                    <p>{{ $course->instructor->bio ?? 'Experienced instructor with a passion for teaching.' }}</p>
                </div>
                {{-- <a href="{{ route('instructor.profile', $course->instructor->user->id) }}" class="text-indigo-600 text-sm mt-2 font-medium">View profile</a> --}}
            </div>

            <!-- Related Courses -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-3">You Might Also Like</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($relatedCourses as $relatedCourse)
                    <div class="bg-white rounded-lg shadow-sm">
                        <a href="{{ route('course.detail', $relatedCourse->slug) }}" class="block">
                            @if($relatedCourse->thumbnail)
                                <img src="{{ asset('storage/' . $relatedCourse->thumbnail) }}" alt="{{ $relatedCourse->title }}" class="w-full h-32 object-cover rounded-t-lg">
                            @else
                                <img src="/api/placeholder/256/150" alt="{{ $relatedCourse->title }}" class="w-full h-32 object-cover rounded-t-lg">
                            @endif
                            <div class="p-3">
                                <h3 class="font-medium mb-1">{{ $relatedCourse->title }}</h3>
                                <div class="flex items-center text-sm mb-2">
                                    <div class="flex text-yellow-400 text-xs">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($relatedCourse->instructor->rating))
                                                <i class="fas fa-star"></i>
                                            @elseif($i - 0.5 <= $relatedCourse->instructor->rating)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="ml-1 text-gray-600 text-xs">{{ number_format($relatedCourse->instructor->rating, 1) }}</span>
                                </div>
                                <div class="flex justify-between items-center mt-2">
                                    @if($relatedCourse->is_free)
                                        <span class="font-bold text-indigo-600">Free</span>
                                    @elseif($relatedCourse->has_discount)
                                        <div>
                                            <span class="font-bold text-indigo-600">₦{{ number_format($relatedCourse->discount_price, 0) }}</span>
                                            <span class="text-xs text-gray-600 line-through">₦{{ number_format($relatedCourse->price, 0) }}</span>
                                        </div>
                                    @else
                                        <span class="font-bold text-indigo-600">₦{{ number_format($relatedCourse->price, 0) }}</span>
                                    @endif
                                    <span class="text-xs text-gray-600">{{ floor($relatedCourse->duration_minutes / 60) }} hours</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Chapters Tab Content -->
        <div class="p-4 tab-content" id="chapters-content">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Course Content</h2>
                <span class="text-sm text-gray-600">{{ $course->chapters->count() }} chapters • {{ $totalLessons }} lessons</span>
            </div>
            
            <!-- Chapter List -->
            <div class="space-y-4">
                @foreach($course->chapters as $chapter)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-3 border-b cursor-pointer chapter-header" data-chapter="{{ $chapter->id }}">
                        <div class="flex justify-between items-center">
                            <h3 class="font-medium">{{ $chapter->order_number }}. {{ $chapter->title }}</h3>
                            <button class="text-gray-500 chapter-toggle" data-chapter="{{ $chapter->id }}">
                                <i class="fas {{ $loop->first ? 'fa-chevron-up' : 'fa-chevron-down' }}" id="chapter-icon-{{ $chapter->id }}"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">{{ $chapter->contents->count() }} lessons • {{ floor($chapter->contents->sum('duration') / 60) }}:{{ sprintf('%02d', $chapter->contents->sum('duration') % 60) }} min</p>
                    </div>
                    <div class="p-3 space-y-3 bg-gray-50 chapter-content {{ $loop->first ? 'open' : '' }}" id="chapter-content-{{ $chapter->id }}">
                        @foreach($chapter->contents as $content)
                        <div class="flex justify-between items-center cursor-pointer" onclick="previewContent('{{ $content->id }}', '{{ $content->content_type }}')">
                            <div class="flex items-center">
                                @if($content->content_type == 'lesson')
                                <i class="fas fa-play-circle text-indigo-600 mr-2"></i>
                                @elseif($content->content_type == 'quiz')
                                <i class="fas fa-question-circle text-orange-500 mr-2"></i>
                                @elseif($content->content_type == 'resources')
                                <i class="fas fa-file-alt text-green-500 mr-2"></i>
                                @endif
                                <span class="text-sm">{{ $content->title }}</span>
                            </div>
                            <span class="text-xs text-gray-500">{{ floor($content->duration / 60) }}:{{ sprintf('%02d', $content->duration % 60) }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Reviews Tab Content -->
        <div class="p-4 tab-content" id="reviews-content">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Student Reviews</h2>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm p-4">
                <!-- Review Summary -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                    <div class="mb-4 sm:mb-0">
                        <div class="text-3xl font-bold">{{ number_format($course->instructor->rating, 1) }}</div>
                        <div class="flex text-yellow-400 mt-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($course->instructor->rating))
                                    <i class="fas fa-star"></i>
                                @elseif($i - 0.5 <= $course->instructor->rating)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <div class="text-sm text-gray-600 mt-1">0 reviews</div>
                    </div>
                    <div class="w-full sm:w-2/3">
                        <!-- Rating Bars -->
                        <div class="flex items-center mb-1">
                            <span class="text-xs w-2 mr-2">5</span>
                            <div class="h-2 bg-gray-200 rounded-full flex-1">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="text-xs ml-2">0%</span>
                        </div>
                        <div class="flex items-center mb-1">
                            <span class="text-xs w-2 mr-2">4</span>
                            <div class="h-2 bg-gray-200 rounded-full flex-1">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="text-xs ml-2">0%</span>
                        </div>
                        <div class="flex items-center mb-1">
                            <span class="text-xs w-2 mr-2">3</span>
                            <div class="h-2 bg-gray-200 rounded-full flex-1">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="text-xs ml-2">0%</span>
                        </div>
                        <div class="flex items-center mb-1">
                            <span class="text-xs w-2 mr-2">2</span>
                            <div class="h-2 bg-gray-200 rounded-full flex-1">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="text-xs ml-2">0%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-xs w-2 mr-2">1</span>
                            <div class="h-2 bg-gray-200 rounded-full flex-1">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="text-xs ml-2">0%</span>
                        </div>
                    </div>
                </div>
                
                <div class="text-center py-8">
                    <p class="text-gray-600">No reviews yet. Be the first to review this course!</p>
                    <button class="mt-4 py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition" onclick="showReviewForm()">
                        Write a Review
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sticky Bottom CTA -->
    <div class="fixed bottom-0 left-0 w-full bg-white border-t p-4 flex items-center justify-between z-30">
        <div>
            @if($course->is_free)
                <p class="font-bold text-xl text-indigo-600">Free</p>
            @elseif($course->has_discount)
                <p class="font-bold text-xl text-indigo-600">₦{{ number_format($course->discount_price, 0) }}</p>
                <p class="text-xs text-gray-600 line-through">₦{{ number_format($course->price, 0) }}</p>
            @else
                <p class="font-bold text-xl text-indigo-600">₦{{ number_format($course->price, 0) }}</p>
            @endif
        </div>
        <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium" onclick="enrollNow('{{ $course->id }}')">
            Enroll Now
        </button>
    </div>

    <!-- Video Modal -->
    <div id="videoModal" class="fixed inset-0 bg-black bg-opacity-90 z-[9999] hidden flex items-center justify-center">
        <div class="w-full h-full max-w-4xl max-h-[80vh] mx-auto my-auto relative">
            <div class="flex justify-end absolute top-4 right-4 z-[10000]">
                <button onclick="closeVideoModal()" class="text-white p-3 bg-black bg-opacity-60 hover:bg-opacity-80 rounded-full">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div class="w-full h-full flex items-center justify-center">
                <div id="videoPlayerContainer" class="w-full h-full"></div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Tab functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all tabs
                document.querySelectorAll('.tab-button').forEach(b => {
                    b.classList.remove('text-indigo-600', 'border-indigo-600');
                    b.classList.add('text-gray-500');
                });
                
                // Add active class to clicked tab
                button.classList.add('text-indigo-600', 'border-indigo-600');
                button.classList.remove('text-gray-500');
                
                // Hide all tab content
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                // Show selected tab content
                const tabName = button.getAttribute('data-tab');
                document.getElementById(`${tabName}-content`).classList.add('active');
            });
        });
        
        // Chapter toggle functionality
        document.querySelectorAll('.chapter-toggle').forEach(toggle => {
            toggle.addEventListener('click', () => {
                const chapterId = toggle.getAttribute('data-chapter');
                const content = document.getElementById(`chapter-content-${chapterId}`);
                const icon = document.getElementById(`chapter-icon-${chapterId}`);
                
                content.classList.toggle('open');
                
                if (content.classList.contains('open')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });
        
        // Toggle description
        function toggleDescription() {
            const fullDescription = document.getElementById('full-description');
            const readMoreBtn = document.getElementById('read-more-btn');
            
            if (fullDescription.style.display === 'none') {
                fullDescription.style.display = 'block';
                readMoreBtn.textContent = 'Read less';
            } else {
                fullDescription.style.display = 'none';
                readMoreBtn.textContent = 'Read more';
            }
        }
        
        // Toggle bookmark
        function toggleBookmark() {
            const icon = document.getElementById('bookmarkIcon');
            
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                // Here you would add code to save the bookmark to the user's account
                showToast('Course bookmarked!');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                // Here you would add code to remove the bookmark from the user's account
                showToast('Bookmark removed');
            }
        }
        
        // Video modal
        function playVideo(videoPath) {
            const modal = document.getElementById('videoModal');
            const container = document.getElementById('videoPlayerContainer');
            
            // Create video player (you would replace this with your actual video player code)
            container.innerHTML = `
                <video controls autoplay class="w-full h-full">
                    <source src="${videoPath}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            `;
            
            modal.style.display = 'flex';
        }
        
        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            const container = document.getElementById('videoPlayerContainer');
            
            container.innerHTML = '';
            modal.style.display = 'none';
        }
        
        // Preview content
        function previewContent(contentId, contentType) {
            // Here you would add code to handle different content types
            if (contentType === 'lesson') {
                showToast('Please enroll in the course to access lessons');
            } else if (contentType === 'quiz') {
                showToast('Please enroll in the course to access quizzes');
            } else if (contentType === 'resources') {
                showToast('Please enroll in the course to access resources');
            }
        }
        
        // Enroll in course
        function enrollNow(courseId) {
            // Here you would add code to handle course enrollment
            window.location.href = `/enroll/${courseId}`;
        }
        
        // Share content
        function shareContent() {
            if (navigator.share) {
                navigator.share({
                    title: document.title,
                    url: window.location.href
                }).catch(console.error);
            } else {
                showToast('Share functionality not supported by your browser');
            }
        }
        
        // Show review form
        function showReviewForm() {
            showToast('Please enroll in the course to leave a review');
        }
        
        // Show toast notification
        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed bottom-20 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-4 py-2 rounded-md z-50';
            toast.textContent = message;
            
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
        
        // Add some CSS for the tabs
        document.head.insertAdjacentHTML('beforeend', `
            <style>
                .tab-content {
                    display: none;
                }
                
                .tab-content.active {
                    display: block;
                }
                
                .chapter-content {
                    display: none;
                }
                
                .chapter-content.open {
                    display: block;
                }
                
                .mobile-tap-target {
                    min-height: 44px;
                    min-width: 44px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
            </style>
        `);
    </script>
</body>
</html>