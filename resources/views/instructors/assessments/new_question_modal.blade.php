<!-- Add Question Modal -->
<div class="modal  fade" id="addQuestionModal" tabindex="10000" aria-labelledby="addQuestionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQuestionModalLabel">Add New Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="questionForm">
                    @csrf
                    <div class="mb-3">
                        <label for="questionContent" class="form-label">Question Content</label>
                        <textarea id="questionContent" name="questionContent" class="form-control tinymce"></textarea>
                    </div>
                    <input type="hidden" value="{{ $examId }}" name="examId">
                    <div id="optionsContainer">
                        <div class="mb-3 option-row">
                            <label class="form-label">Option 1</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="option[]" required>
                                <div class="input-group-text">
                                    <input type="radio" name="correct_option" value="1" required>
                                    <label class="form-check-label ms-2">Correct</label>
                                </div>
                                <button type="button" class="btn btn-danger remove-option-btn">Remove</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary mt-2" id="addOptionBtn">+ Add Option</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveQuestionBtn">Save Question</button>
            </div>
        </div>
    </div>
</div>
