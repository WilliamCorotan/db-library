<!-- Modal -->
<div class="modal fade" id="return-book-prompt-modal" tabindex="1" aria-labelledby="returnBookPromptModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <p>Are you sure you want to return this book (<span id="book-name" class="fw-bold"></span>)? </p>
                <input type="date" name="return_date" id="edit-return-date" class="form-control">
                <small id="return-date-error" class="text-danger"></small>
            </div>
            <div class="modal-footer">
                <button id="cancel-book-return" type="button" class="btn btn-secondary">Cancel</button>
                <button id="return-book" type="button" class="btn btn-primary">Return Book</button>
            </div>
        </div>
    </div>
</div>