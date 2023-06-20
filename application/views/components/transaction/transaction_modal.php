<!-- Modal -->
<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transaction-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <?= form_open_multipart(
                '',
                array('id' => 'edit-transaction-form')
            ) ?>
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="transaction-number"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div>
                        <input type="hidden" name="id" id="edit-id">
                        <input type="hidden" name="book_id" id="edit-book-id">
                        <div class="mb-3 row">
                            <label for="title" class="col-form-label">Title</label>
                            <div>
                                <input type="text" class="form-control" name="title" id="edit-title" aria-describedby="titleId" placeholder="Book Title" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="borrow_date" class="col-form-label">Borrow Date</label>
                            <div>
                                <input type="date" class="form-control" name="borrow_date" id="edit-borrow_date" aria-describedby="borrowDateId" placeholder="Borrow Date" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="due_date" class="col-form-label">Due Date</label>
                            <div>
                                <input type="date" class="form-control" name="due_date" id="edit-due_date" aria-describedby="returnDateId" placeholder="Due Date" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="first_name" class="col-form-label">First Name</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="first_name" id="edit-first_name" aria-describedby="firstNameId" placeholder="First Name" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="last_name" class="col-form-label">Last Name</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="last_name" id="edit-last_name" aria-describedby="lastNameId" placeholder="Last Name" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="contact_number" class="col-form-label">Contact Number</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="contact_number" id="edit-contact_number" aria-describedby="contactNumberId" placeholder="Contact Number" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div>
                                <div class="mb-3">
                                    <label for="return_status_id" class="form-label">Return Status</label>
                                    <select class="form-select" name="return_status_id" id="edit-return_status_id" disabled>
                                        <option value="1">Not Returned</option>
                                        <option value="2">Returned</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="return-btn" class="btn btn-primary">Return</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>

<?php $this->load->view('components/books/return_book_prompt') ?>
<script src="<?= base_url('assets/js/book/returnBook.js') ?>"></script>