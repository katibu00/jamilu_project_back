<div id="addLessonModal{{ $chapter->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Add Lesson to {{ $chapter->title }}
                        </h3>
                        <div class="mt-2">
                            <form id="addLessonForm{{ $chapter->id }}" action="{{ route('courses.add-lesson') }}" method="POST">
                                @csrf
                                <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                                <div class="mb-4">
                                    <label for="lessonTitle{{ $chapter->id }}" class="block text-sm font-medium text-gray-700">Lesson Title</label>
                                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="lessonTitle{{ $chapter->id }}" name="lesson_title" required>
                                </div>
                                <div class="mb-4">
                                    <label for="duration{{ $chapter->id }}" class="block text-sm font-medium text-gray-700">Duration</label>
                                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="duration{{ $chapter->id }}" name="duration" required>
                                </div>
                                <div class="mb-4">
                                    <label for="lessonOrder{{ $chapter->id }}" class="block text-sm font-medium text-gray-700">Order Number</label>
                                    <input type="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="lessonOrder{{ $chapter->id }}" name="lesson_order" required>
                                </div>
                                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Add Lesson
                                    </button>
                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" onclick="closeModal('addLessonModal{{ $chapter->id }}')">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>